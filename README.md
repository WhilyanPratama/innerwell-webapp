# InnerWell Klinic WebApp 🏥

<p align="center">
  <img style="margin-right: 8px;" src="https://img.shields.io/badge/Laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white" />
  <img style="margin-right: 8px;" src="https://img.shields.io/badge/Blade-%23000000.svg?style=for-the-badge&logo=laravel&logoColor=white" />
  <img style="margin-right: 8px;" src="https://img.shields.io/badge/PHP-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white" />
  <img style="margin-right: 8px;" src="https://img.shields.io/badge/Docker-%234688F1.svg?style=for-the-badge&logo=docker&logoColor=white" />
</p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

Aplikasi Klinik InnerWell adalah sebuah sistem manajemen klinik berbasis web yang dibangun dengan Laravel. Aplikasi ini bertujuan untuk mempermudah pengelolaan data pasien, jadwal dokter, antrian, dan berbagai aspek operasional klinik lainnya. Dengan antarmuka yang intuitif dan fitur-fitur yang lengkap, InnerWell membantu meningkatkan efisiensi dan kualitas pelayanan klinik.

## Fitur Utama ✨

*   **👨‍⚕️ Manajemen Dokter:** Kelola informasi dokter, jadwal praktik, dan spesialisasi dengan mudah.
*   **📅 Manajemen Antrian:** Sistem antrian terintegrasi untuk mengatur alur pasien dengan efisien dan mengurangi waktu tunggu.
*   **📊 Dashboard Analitik:** Dapatkan wawasan berharga tentang kinerja klinik melalui dashboard yang informatif.
*   **💰 Integrasi Pembayaran Midtrans:** Memudahkan pasien dalam melakukan pembayaran secara online.

## Tech Stack 🛠️

*   Bahasa: PHP
*   Framework: Laravel
*   Templating Engine: Blade
*   Database: (Kemungkinan) MySQL atau PostgreSQL 
*   Containerization: Docker

## Instalasi & Menjalankan 🚀

1.  Clone repositori:
    ```bash
    git clone https://github.com/WhilyanPratama/innerwell-webapp
    ```

2.  Masuk ke direktori:
    ```bash
    cd innerwell-webapp
    ```

3.  Install dependensi:
    ```bash
    composer install
    ```
   Pastikan Composer sudah terinstall di sistem Anda. Jika belum, unduh dan install dari [https://getcomposer.org/](https://getcomposer.org/)

4.  Salin file `.env.example` menjadi `.env`:
     ```bash
     cp .env.example .env
     ```

5.  Generate application key:
    ```bash
    php artisan key:generate
    ```

6. Konfigurasi database pada file `.env`. Sesuaikan dengan pengaturan database lokal Anda.

7. Migrasi database:
    ```bash
    php artisan migrate
    ```

8.  Jalankan proyek:
    ```bash
    php artisan serve
    ```

    Buka browser Anda dan kunjungi `http://localhost:8000`.

## Cara Berkontribusi 🤝

1.  Fork repositori ini.
2.  Buat branch untuk fitur Anda (`git checkout -b feature/nama-fitur`).
3.  Commit perubahan Anda (`git commit -m 'Tambahkan fitur baru'`).
4.  Push ke branch Anda (`git push origin feature/nama-fitur`).
5.  Buat Pull Request.
