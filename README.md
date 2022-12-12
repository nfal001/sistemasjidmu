# Sistem Masjidmu

[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)

Demo: [https://youtu.be/QfkTETmJl3o](https://youtu.be/QfkTETmJl3o)

Explaining: [https://youtu.be/UlZ--6HehHg](https://youtu.be/UlZ--6HehHg)

**This Projectt is Still In Development, please expect some bug**

Website summary jadwal sholat untuk masjid dengan beberapa fitur tambahan

## Preview

![App Screenshot](https://raw.githubusercontent.com/nfal001/sistemasjidmu/master/.github/SS.jpg)

![App Screenshot1](https://raw.githubusercontent.com/nfal001/sistemasjidmu/master/.github/SS__40.jpg)

## Fitur

-   dump data jadwal sholat dari api.myquran.com
-   Summary Jadwal Sholat
-   Pengumuman dalam bentuk Running Text
-   Sistem Keuangan Masjid

### TODO

-   [x] Summary Jadwal Sholat
-   [x] Dump data jadwal sholat dari api.myquran.com
-   [ ] Refresh Website Saat bulan beda
-   [ ] Pengumuman dalam bentuk Running Text
-   [ ] Sistem Keuangan Masjid (Dashboard)
-   [ ] Onboarding Guider (Panduan Pertama)
-   [ ] Redesign Summary Jadwal Sholat
-   [ ] Refactoring Code untuk mempermudah pengembangan aplikasi
-   [ ] Simpan API respose cache ke browser
-   [ ] Improvement API sistemasjidmu
-   [ ] Penambahan fitur API jadwal Harian, Jadwal Tahunan

## Instalasi & Konfigurasi

#### 1. Clone Repository

```
 git clone https://github.com/nfal001/sistemasjidmu.git
 cd sistemasjid
 composer install
 npm install
 copy .env.example .env
```

#### 2. Instalasi Website

```
 php artisan key:generate
```

#### 3. Menjalankan Website

```
 php artisan serve
```

#### 3. Akses Website

```
 http://127.0.0.1:8000/summary/1608/2022/12
 http://127.0.0.1:8000/summary/{kotaID}/{year}/{month}
```

#### 3. API link

```
 http://127.0.0.1:8000/api/v1/sholat/0109/2023/06
 http://127.0.0.1:8000/api/v1/sholat/{kotaID}/{year}/{month}
```

## Features Used

**Laravel Features used:** GuzzleHTTP

**Javascript Features used:** moment.js, sweetalert2,

## License

Copyright @2022 Abdurrahman Naufal

Sistem Masjidmu is Open-Source And Under [MIT License](https://choosealicense.com/licenses/mit/)
