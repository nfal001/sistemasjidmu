<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-duration-format/2.3.2/moment-duration-format.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/locale/id.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <title>Masjid Al-Habib</title>
    </head>
    <body style="text-align: center">
        Ini Waktu Sholat
        <h2>Masjid Al-Habib</h2>
        <div class="lokasi">
            <h4>
                <span class="kabupaten"></span>, <span class="provinsi"></span>
            </h4>
        </div>
        <div class="date"></div>
        <div class="live"><h2 class="liveclock"></h2></div>
        <div class="sholat flex">
            <h4>Jadwal Sholat</h4>
        </div>
        <div class="countdown"></div>

        <script>
            let responses, daerah, lokasi, jadwal, realjadwal, t1;
            async function getSholatBulanan(kotaID, tahun, bulan) {
                // let jobs;
                let property = {
                    url: window.origin,
                    requestOptions: {
                        method: "GET",
                        redirect: "follow",
                    },
                };
                return fetch(
                    `${property.url}/api/v1/sholat/${kotaID}/${tahun}/${bulan}`,
                    property.requestOptions
                )
                    .then((response) => response.json())
                    .then((result) => {
                        let data = result;
                        return data;
                    })
                    .catch((error) => console.log("error", error));
            }

            const getWaktuSekarang = () => {
                return moment().format("HH:mm:ss dddd, DD MMMM yyyy");
            }
            
            const checkTime = (scheduleData,BulanSekarang) => {
                // console.log(scheduleData);
                // const test = {
                //     waktunya: "08:05:25",
                //     waktu2: "08:05:55",
                // };
                const exactMonth = moment().format("MM");
                // console.log(exactTime);
                // console.log(BulanSekarang);
                for (const [key, value] of Object.entries(scheduleData)) {
                    // console.log(key);
                    // console.log(value);
                    const thisTime = moment().format("HH:mm:ss");
                    const schedule = moment(value, "HH:mm").format("HH:mm:ss");
                    if (thisTime === schedule) {
                        memasukiSholat(key);
                        // console.log('waktu sama popup');
                    }
                    // console.log(schedule)
                }
                if (BulanSekarang != exactMonth){
                    // console.log('man');
                    // console.log(`${window.location.origin}/api/v1/${kotaID}/${year}/11`);
                    // window.location.href = `${window.location.origin}/summary/0108/2022/${exactMonth}`;
                }
                return;
            };

            const memasukiSholat = (sholat, seconds = 600) => {
                // console.log(sholat+seconds);
                return Swal.fire({
                    title: `Memasuki Waktu Sholat ${sholat}!`,
                    html: "Hitung Waktu Mundur Iqomah <br/> <strong></strong> <br/><br/>",
                    timer: seconds * 1000,
                    didOpen: () => {
                        const content = Swal.getHtmlContainer();
                        const $ = content.querySelector.bind(content);

                        Swal.showLoading();

                        function toggleButtons() {
                            stop.disabled = !Swal.isTimerRunning();
                            resume.disabled = Swal.isTimerRunning();
                        }

                        timerInterval = setInterval(() => {
                            Swal.getHtmlContainer().querySelector(
                                "strong"
                            ).textContent = moment
                                .utc(Swal.getTimerLeft())
                                .format("mm [menit] ss [detik]");
                        }, 100);
                    },
                    willClose: () => {
                        clearInterval(timerInterval);
                    },
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        Swal.fire({
                            title: "Waktunya IQOMAH",
                            html: "menutup dalam <b></b>",
                            timer: 20000,
                            // timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading();
                                const b =
                                    Swal.getHtmlContainer().querySelector("b");
                                timerInterval = setInterval(() => {
                                    b.textContent = moment
                                        .utc(Swal.getTimerLeft())
                                        .format("mm [menit] ss [detik]");
                                }, 100);
                            },
                            willClose: () => {
                                clearInterval(timerInterval);
                            },
                        });
                    }
                });
            };

            document.querySelector(".date").textContecobant =
                moment().format("dddd, DD MMMM yyyy");

            const live = (scheduleData) => {
                const now = moment().format("HH:mm:ss dddd, DD MMMM yyyy");
                const timeNow = moment().format("HH:mm:ss");
                // console.log(`${now} ${scheduleDate}`);
                document.querySelector(
                    ".liveclock"
                ).textContent = `sekarang jam: ${timeNow}`;
                let coba = 11;
                checkTime(scheduleData,coba);
                setTimeout(live, 1000, scheduleData);
            };



            document.addEventListener("DOMContentLoaded", async function () {
                // const now = moment().format("HH:mm:ss dddd, DD MMMM yyyy");
                const kotaID = "{{$kotaID}}";
                const year = "{{$year}}";
                const month = "{{$month}}";

                responses = await getSholatBulanan(kotaID, year, month); //kotaid,tahun,bulan
                let data = responses.data;
                ({ daerah, lokasi, jadwal, ...t1 } = data);
                
                // let tanggal = moment(now,"HH:mm:ss dddd, DD MMMM yyyy").date();
                const chooseData = jadwal[moment().date() - 1];
                // console.log(chooseData);
                
                ({ tanggal, terbit, dhuha, date, ...realjadwal } = chooseData);

                // tanggalSekarang = moment(tanggal,"dddd, DD/MM/YYYY").format("DD");

                // console.log(realjadwal);
                // const sholat = [imsak,subuh,dzuhur,ashar,manghrib,isya];

                document.querySelector(".kabupaten").textContent = lokasi
                    .substr(5, lokasi.length)
                    .toLowerCase();
                document.querySelector(".provinsi").textContent =
                    daerah.toLowerCase();
                Object.keys(realjadwal).forEach(
                    (x) =>
                        (document.querySelector(
                            ".sholat"
                        ).innerHTML += `<p>${x}: ${realjadwal[x]}</p>`)
                );
                live(realjadwal);
                // Object.getOwnPropertyNames(jadwal[0]).map((y)=> console.log(`${y}: ${jadwal[0][y]}`))
            });
        </script>
    </body>
</html>
