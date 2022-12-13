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
                const kotaID = "{{$kotaID}}";
                const year = "{{$year}}";
                const month = "{{$month}}";
        </script>

        @vite('resources/js/apis.js')
    </body>
</html>
