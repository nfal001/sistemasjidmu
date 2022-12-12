// document.querySelector(".imsak").textContent = wan.jadwal[0].imsak;
// document.querySelector('.countdown').textContent = moment(`${document.querySelector(".imsak").textContent} 20221023`, "HH:MM YYYYMMDD").fromNow(); // 11 years ago

// let response = await fetch(
// "https://api.myquran.com/v1/sholat/jadwal/1609/2021/04",
// requestOptions
// ).then().then
// const data = await response.json();
// console.log(data)
// const result = await Promise.all(job);
// return result;

// let job = await fetch(
// "https://api.myquran.com/v1/sholat/jadwal/1609/2021/04",
// requestOptions
// )

// // console.log(data)
// let data = await job.json();
// console.log(data);

            const getTimes = () => {
                const wan = new Date();
                h = wan.getHours() < 10 ? `0${wan.getHours()}` : wan.getHours();
                m =
                    wan.getMinutes() < 10
                        ? `0${wan.getMinutes()}`
                        : wan.getMinutes();
                s =
                    wan.getSeconds() < 10
                        ? `0${wan.getSeconds()}`
                        : wan.getSeconds();
                const exact = `${h}:${m}:${s}`;
                return { exact, h, m, s };
            };


                // function JadwalApi() {
                //     let requestOptions = {
                //         method: "GET",
                //         redirect: "follow",
                //     };
                //     return fetch(
                //         "https://api.myquran.com/v1/sholat/jadwal/1609/2021/04",
                //         requestOptions
                //     )
                //         .then((response) => response.json())
                //         .then((result) => {
                //             let data = result;
                //             return data;
                //         })
                //         .catch((error) => console.log("error", error));
                // }
                // return JadwalApi();

                // [tanggal,date,...realjadwal] = jadwal;
                // [...{}] = jadwal;
                // jadwal.forEach(element => {
                //     ({tanggal,date,terbit,dhuha,...realjadwal}) = element;
                // });

                        <!-- Object.keys(jadwal[0]).forEach(x=>console.log(`<p>${x}: ${jadwal[0][x]}</p>`)) -->




        TODO Logic;
         1.* done
         1.! done

         1.? done
         2.? done
         3.? done

         1.: done
