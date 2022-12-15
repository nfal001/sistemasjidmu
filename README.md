# Sistem Masjidmu

[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)

Explaining: [https://youtu.be/E7BDIRv23ws](https://youtu.be/E7BDIRv23ws)

(Legacy) Demo: [https://youtu.be/QfkTETmJl3o](https://youtu.be/QfkTETmJl3o)

(Legacy) Explaining: [https://youtu.be/UlZ--6HehHg](https://youtu.be/UlZ--6HehHg)

**This Projectt is Still In Development, please expect some bug**

Website summary jadwal sholat untuk masjid dengan beberapa fitur tambahan

## Preview

![App Screenshot](https://raw.githubusercontent.com/nfal001/sistemasjidmu/dev/.github/SS__62.jpg)

![App Screenshot1](https://raw.githubusercontent.com/nfal001/sistemasjidmu/dev/.github/SS__60.jpg)

## Fitur

-   dump data jadwal sholat dari api.myquran.com
-   Summary Jadwal Sholat
-   Pengumuman dalam bentuk Running Text
-   Sistem Keuangan Masjid

### TODO

-   [x] Summary Jadwal Sholat
-   [x] Dump data jadwal sholat dari api.myquran.com
-   [x] Redesign Summary Jadwal Sholat
-   [x] Ganti Jadwal Saat Bulan berubah
-   [x] Ganti Jadwal Saat tanggal berubah
-   [ ] Pengumuman dalam bentuk Running Text dihubungkan dengan database.
-   [ ] Sistem Keuangan Masjid (Dashboard)
-   [ ] Onboarding Guider (Panduan Pertama)
-   [ ] Refactoring Code untuk mempermudah pengembangan aplikasi
-   [ ] Improvement API sistemasjidmu
-   [ ] Penambahan fitur API jadwal Harian, Jadwal Tahunan
-   [ ] ~~Simpan API respose cache ke browser~~

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
