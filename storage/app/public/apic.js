let responses, daerah, lokasi, jadwal, swiper, realjadwal, t1, tanggal, date;
let selectTglArray = moment().date - 1;
const standardFullTimeFormat = "HH:mm:ss dddd, DD MMMM yyyy";
const hms = "HH:mm:ss";
async function getSholatBulanan(kotaID, tahun, bulan) {
    // let jobs;
    const property = {
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
            const data = result;
            return data;
        })
        .catch((error) => {
            document.location.reload();
            console.log("error", error);
        });
}

const getWaktuSekarang = () => {
    return moment().format(standardFullTimeFormat);
};

const checkTime = (scheduleData, BulanJadwal) => {
    // console.log(scheduleData);
    // const test = {
    //     waktunya: "08:05:25",
    //     waktu2: "08:05:55",
    // };
    const exactMonth = moment().format("MM");
    const exactYear = moment().format("YYYY");
    // console.log(scheduleData);
    for (const [key, value] of Object.entries(scheduleData)) {
        // console.log(key);
        // console.log(value);
        const thisTime = moment().format("HH:mm:ss");
        const schedule = moment(value, "HH:mm").format("HH:mm:ss");
        console.log(thisTime, schedule);

        if (thisTime === schedule) {
            memasukiSholat(key);
        }
        // console.log(schedule)
    }
    const tanggalJadwalArray =
        moment(tanggal, "dddd, DD/MM/YYYY").format("DD") - 1;
    const selectTglArray = moment().date() - 1;
    if (BulanJadwal != exactMonth) {
        // console.log(BulanJadwal, exactMonth);
        // console.log('man');
        // console.log(`${window.location.origin}/api/v1/${kotaID}/${year}/11`);
        window.location.href = `${window.location.origin}/summary/${kotaID}/${exactYear}/${exactMonth}`;
    } else if (selectTglArray != tanggalJadwalArray) {
        panenin();
        console.log("menyesuaikan jadwal sholat");
        Object.keys(realjadwal).forEach((y) => {
            document.querySelectorAll(`.waktu-${y}`).forEach((x) => {
                x.textContent = `${realjadwal[y]}`;
            });
        });
        document.querySelector(".date").textContent =
            moment().format("dddd, DD MMMM yyyy");
    }
    return;
};

const memasukiSholat = (sholat, seconds = 600) => {
    // console.log(sholat+seconds);
    sholat == "imsak"
        ? Swal.fire({
              title: `Memasuki Waktu ${sholat}!`,
              html: `Waktunya Berhenti Sahur Dalam<br/> <strong></strong> <br/><br/>`,
              timer: seconds * 1000,
              showConfirmButton: false,
              didOpen: () => {
                  const content = Swal.getHtmlContainer();
                  const $ = content.querySelector.bind(content);

                  // Swal.showLoading();

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
          })
        : Swal.fire({
              title: `Memasuki Waktu Sholat ${sholat}!`,
              html: `
              Hitung Waktu Mundur Iqomah <br/> <strong></strong> <br/><br/>
              `,
              timer: seconds * 1000,
              showConfirmButton: false,
              didOpen: () => {
                  const content = Swal.getHtmlContainer();
                  const $ = content.querySelector.bind(content);

                  // Swal.showLoading();

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
              if (result.dismiss === Swal.DismissReason.timer) {
                  Swal.fire({
                      title: "Waktunya IQOMAH",
                      html: "menutup dalam <b></b>",
                      timer: 40000,
                      showConfirmButton: false,
                      // timerProgressBar: true,
                      didOpen: () => {
                          // Swal.showLoading();
                          const b = Swal.getHtmlContainer().querySelector("b");
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

const live = (scheduleData) => {
    const now = getWaktuSekarang();
    const timeNow = moment().format("HH:mm:ss");
    // console.log(`${now} ${scheduleData}`);
    // console.log(tanggal);
    const BulanJadwal = moment(tanggal, "dddd, DD/MM/YYYY").format("MM");
    document.querySelector(".hijri").textContent = moment().format(
        "iDD iMMMM iYYYY [H]"
    );
    document.querySelector(".liveclock").textContent = `${timeNow}`;
    checkTime(realjadwal, BulanJadwal);
    setTimeout(live, 1000, realjadwal);
};
const panenin = () => {
    const chooseData = jadwal[moment().date() - 1];
    // console.log(chooseData);
    ({ tanggal, terbit, dhuha, date, ...realjadwal } = chooseData);
    return tanggal;
};
document.addEventListener("DOMContentLoaded", async function () {
    responses = await getSholatBulanan(kotaID, year, month); //kotaid,tahun,bulan
    const data = responses.data;
    ({ daerah, lokasi, jadwal, ...t1 } = data);
    const chooseData = jadwal[1];
    document.querySelector(".date").textContent =
        moment().format("dddd, DD MMMM yyyy");
    ({ tanggal, terbit, dhuha, date, ...realjadwal } = chooseData);

    // console.log(realjadwal);
    // const sholat = [imsak,subuh,dzuhur,ashar,manghrib,isya];

    document.querySelector(".kabupaten").textContent = lokasi
        .substr(5, lokasi.length)
        .toLowerCase();
    document.querySelector(".provinsi").textContent = daerah.toLowerCase();
    Object.keys(realjadwal).forEach(
        (x) =>
            (document.querySelector(".sholat").innerHTML += `
            <div
            class="jadwal imsak text-center font-bold bg-[#077E04] rounded-2xl">
            <div
              class="judul bg-white xl:px-11 lg:px-8 py-5 lg:py-3 xl:text-4xl lg:text-2xl text-[#077E04] rounded-2xl">
              ${x}
            </div>
            <div class="waktu-${x} xl:px-11 lg:px-8 py-6 lg:py-4 xl:text-6xl lg:text-4xl text-white">
              ${realjadwal[x]}
            </div>
          </div>
            `)
    );

    swiper = new Swiper(".swiper", {
        // Optional parameters
        direction: "horizontal",
        loop: true,
        observer: true,
        observeSlideChildren: true,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        },
    });
    live();
    // Object.getOwnPropertyNames(jadwal[0]).map((y)=> console.log(`${y}: ${jadwal[0][y]}`))
});
