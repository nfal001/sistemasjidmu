<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            animation: {
              marquee: "marquee 60s linear infinite",
              marquee2: "marquee2 60s linear infinite",
            },
            keyframes: {
              marquee: {
                "0%": { transform: "translateX(0%)" },
                "100%": { transform: "translateX(-100%)" },
              },
              marquee2: {
                "0%": { transform: "translateX(100%)" },
                "100%": { transform: "translateX(0%)" },
              },
            },
          },
        },
      };
    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/moment-hijri@2.1.2/moment-hijri.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-duration-format/2.3.2/moment-duration-format.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/locale/id.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <title>Masji Hbbi</title>
    <style>
      .swiper {
        min-width: 100%;
      }
    </style>
  </head>
  <body>
    <div
      class="min-h-screen bg-[#444444] flex flex-col justify-between p-2 gap-2">
      <header
        class="bg-[#292D29] text-white rounded-lg flex justify-between px-10 py-4 lg:py-5 xl:py-12 xl:rounded-xl">
        <div class="my-auto">
          <p class="text-xl lg:text-4xl xl:text-7xl font-bold py-4">
            Masjid Al-Haji
          </p>
          <p class="text-xs lg:text-xl xl:text-4xl">
            Jalan Prawirotaman, Wirobrajan, Banguntapan<br />
            <span class="kabupaten"></span>, <span class="provinsi"></span>
          </p>
          <!-- <p class="text-xs lg:text-xl xl:text-4xl">aceh tengah, aceh</p> -->
        </div>
        <div class="text-right my-auto">
          <div class="clock text-xl lg:text-2xl xl:text-4xl font-normal">
            <p>Waktu Terkini</p>
          </div>
          <div class="clock text-xl lg:text-4xl xl:text-6xl font-bold py-2">
            <p class="liveclock"></p>
          </div>
          <div class="text-xs lg:text-xl xl:text-3xl font-semibold">
            <p class="date"></p>
          </div>
          <div class="text-xs lg:text-xl xl:text-3xl font-normal">
            <p class="hijri"></p>
          </div>
        </div>
      </header>
      <main
        class="bg-[url('{{asset('storage/image/Burka.jpg')}}')] bg-cover bg-center flex-1 rounded-lg xl:rounded-xl flex">
        <div class="swiper rounded-lg flex-1">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper w-full relative">
            <!-- Slides -->
            <div
              class="swiper-slide jadwal-sholat p-10 lg:p-6 bg-[#C5FFBC]/50 flex flex-col justify-end"
              data-swiper-autoplay="15000">
              <div
                class="sholat flex flex-row gap-6 justify-center justify-items-center">
                {{-- <div
                  class="jadwal imsak text-center font-bold bg-[#077E04] rounded-2xl">
                  <div
                    class="judul bg-white xl:px-11 py-5 xl:text-4xl text-[#077E04] rounded-2xl">
                    imsak
                  </div>
                  <div class="waktu xl:px-11 py-6 xl:text-6xl text-white">
                    05:00
                  </div>
                </div> --}}
                {{--}}
                <div
                  class="jadwal subuh text-center font-bold bg-[#077E04] rounded-2xl">
                  <div
                    class="judul bg-white xl:px-11 py-5 xl:text-4xl text-[#077E04] rounded-2xl">
                    subuh
                  </div>
                  <div class="waktu xl:px-11 py-6 xl:text-6xl text-white">
                    05:10
                  </div>
                </div>
                <div
                  class="jadwal dzuhur text-center font-bold bg-[#077E04] rounded-2xl">
                  <div
                    class="judul bg-white xl:px-11 py-5 xl:text-4xl text-[#077E04] rounded-2xl">
                    dzuhur
                  </div>
                  <div class="waktu xl:px-11 py-6 xl:text-6xl text-white">
                    12:31
                  </div>
                </div>
                <div
                  class="jadwal ashar text-center font-bold bg-[#077E04] rounded-2xl">
                  <div
                    class="judul bg-white xl:px-11 py-5 xl:text-4xl text-[#077E04] rounded-2xl">
                    ashar
                  </div>
                  <div class="waktu xl:px-11 py-6 xl:text-6xl text-white">
                    15:53
                  </div>
                </div>
                <div
                  class="jadwal maghrib text-center font-bold bg-[#077E04] rounded-2xl">
                  <div
                    class="judul bg-white xl:px-11 py-5 xl:text-4xl text-[#077E04] rounded-2xl">
                    mahrib
                  </div>
                  <div class="waktu xl:px-11 py-6 xl:text-6xl text-white">
                    18:30
                  </div>
                </div>
                <div
                  class="jadwal isya text-center font-bold bg-[#077E04] rounded-2xl">
                  <div
                    class="judul bg-white xl:px-11 py-5 xl:text-4xl text-[#077E04] rounded-2xl">
                    isya
                  </div>
                  <div class="waktu xl:px-11 py-6 xl:text-6xl text-white">
                    19:40
                  </div>
                </div> --}}
              </div>
            </div>
            <div
              class="swiper-slide p-3 text-7"
              data-swiper-autoplay="2000"></div>
            <div class="swiper-slide p-3 bg-sky-400/75">Slide 3</div>
          </div>
        </div>
      </main>
      <footer
        class="bg-[#077E04] rounded-lg p-2 xl:text-2xl lg:text-sm xl:rounded-xl">
        <div class="relative flex overflow-x-hidden running-masjid">
          <div class="animate-marquee whitespace-nowrap">
            <span class="text-2xl font-normal text-white mx-20"
              >إنَّمَا الأعمَال بالنِّيَّاتِ وإِنَّما لِكُلِّ امريءٍ ما"
              نَوَى"</span
            >
            <span class="text-2xl font-normal text-white mx-16"
              >"Sesungguhnya setiap amalan tergantung pada niatnya" (HR. Bukhari
              dan Muslim)
            </span>
            <span class="text-2xl font-normal text-white mx-16">
              Waktu Sholat 12:39:59 Rabu, 14 Desember 2022 10 Dzulhijjah 1440 H
            </span>
            <span class="text-2xl font-normal text-white mx-16"
              >Laporan Keuangan Mingguan: Uang Masuk RP.50.000.0000 Uang Keluar
              Rp.2.000.000 Total Kas Akhir: 480.999.000</span
            >
            <span class="text-2xl font-normal text-white mx-16"
              >Assalamualaikum</span
            >
          </div>
          <div class="absolute animate-marquee2 whitespace-nowrap">
            <span class="text-2xl font-normal text-white mx-16"
              >إنَّمَا الأعمَال بالنِّيَّاتِ وإِنَّما لِكُلِّ امريءٍ ما"
              نَوَى"</span
            >
            <span class="text-2xl font-normal text-white mx-16"
              >"Sesungguhnya setiap amalan tergantung pada niatnya" (HR. Bukhari
              dan Muslim)
            </span>
            <span class="text-2xl font-normal text-white mx-16"
              >Waktu Sholat 12:39:59 Rabu, 14 Desember 2022 10 Dzulhijjah 1440 H
            </span>
            <span class="text-2xl font-normal text-white mx-16"
              >Laporan Keuangan Mingguan: Uang Masuk RP.50.000.0000 Uang Keluar
              Rp.2.000.000 Total Kas Akhir: 480.999.000</span
            >
            <span class="text-2xl font-normal text-white mx-16"
              >Assalamualaikum</span
            >
          </div>
        </div>
      </footer>
    </div>
    <script>
            const kotaID = "{{$kotaID}}";
      const year = "{{$year}}";
      const month = "{{$month}}";

    </script>
        <script type="text/javascript" src="{{ asset('storage/apic.js') }}"></script>

  </body>
</html>
