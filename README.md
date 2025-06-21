# InnerWell Klinic WebApp 🏥

<p align="center">
  <img style="margin-right: 8px;" src="https://img.shields.io/badge/Laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white" />
  <img style="margin-right: 8px;" src="https://img.shields.io/badge/Blade-%23000000.svg?style=for-the-badge&logo=laravel&logoColor=white" />
  <img style="margin-right: 8px;" src="https://img.shields.io/badge/PHP-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white" />
  <img style="margin-right: 8px;" src="https://img.shields.io/badge/Docker-%234688F1.svg?style=for-the-badge&logo=docker&logoColor=white" />
</p>

InnerWell Klinic WebApp adalah sebuah sistem manajemen klinik berbasis web yang dibangun dengan Laravel. Aplikasi ini bertujuan untuk mempermudah pengelolaan data pasien, jadwal dokter, antrian, dan berbagai aspek operasional klinik lainnya. Dengan antarmuka yang intuitif dan fitur-fitur yang lengkap, InnerWell membantu meningkatkan efisiensi dan kualitas pelayanan klinik.

## Fitur Utama ✨

*   **👨‍⚕️ Manajemen Dokter:** Kelola informasi dokter, jadwal praktik, dan spesialisasi dengan mudah.
*   **📅 Manajemen Antrian:** Sistem antrian terintegrasi untuk mengatur alur pasien dengan efisien dan mengurangi waktu tunggu.
*   **📊 Dashboard Analitik:** Dapatkan wawasan berharga tentang kinerja klinik melalui dashboard yang informatif.
*   **💰 Integrasi Pembayaran Midtrans:** Memudahkan pasien dalam melakukan pembayaran secara online.

## Tech Stack 🛠️

*   Bahasa: PHP
*   Framework: Laravel
*   Templating Engine: Blade
*   Database: MySQL
*   Containerization: Docker

### Prasyarat

Pastikan telah terinstall:

* **Docker & Docker Compose**: [Panduan Instalasi Docker](https://docs.docker.com/get-docker/)
* **Git**: Untuk melakukan kloning repositori.
* **Terminal/Shell**: Seperti Command Prompt, PowerShell, atau Terminal di Linux/macOS.

### Instalasi dengan Docker

Metode yang direkomendasikan untuk menjalankan aplikasi ini adalah menggunakan Docker untuk memastikan konsistensi lingkungan.

1.  **Kloning Repositori**
    ```sh
    git clone [https://github.com/whilyanpratama/innerwell-webapp.git](https://github.com/whilyanpratama/innerwell-webapp.git)
    cd innerwell-webapp
    ```

2.  **Konfigurasi Environment**
    Salin file `.env.example` menjadi `.env`. File ini berisi konfigurasi utama aplikasi.
    ```sh
    cp .env.example .env
    ```
    Buka file `.env` dan sesuaikan konfigurasi database dan layanan lain jika diperlukan. Konfigurasi default sudah disesuaikan untuk Docker.

3.  **Jalankan Container Docker**
    Bangun dan jalankan semua service (Nginx, PHP, MySQL) menggunakan `docker-compose`.
    ```sh
    docker-compose up -d --build
    ```

4.  **Install Dependensi (Composer)**
    Masuk ke dalam container `app` dan install semua dependensi PHP.
    ```sh
    docker-compose exec app composer install
    ```

5.  **Install Dependensi (NPM)**
    Install dependensi JavaScript yang dibutuhkan.
    ```sh
    docker-compose exec app npm install
    ```

6.  **Generate Application Key**
    Buat kunci enkripsi unik untuk aplikasi Laravel Anda.
    ```sh
    docker-compose exec app php artisan key:generate
    ```

7.  **Jalankan Migrasi & Seeder Database**
    Buat struktur tabel database dan isi dengan data awal (termasuk akun demo).
    ```sh
    docker-compose exec app php artisan migrate --seed
    ```

8.  **Hubungkan Penyimpanan**
    Buat symbolic link dari `public/storage` ke `storage/app/public`.
    ```sh
    docker-compose exec app php artisan storage:link
    ```

9.  **Compile Aset Frontend**
    Jalankan Vite untuk meng-compile file CSS dan JS.
    ```sh
    docker-compose exec app npm run dev
    ```

10. **Selesai!**
    Aplikasi sekarang seharusnya sudah berjalan. Buka browser Anda dan akses:
    [**http://localhost:8000**](http://localhost:8000)

## Cara Berkontribusi 🤝

1.  Fork repositori ini.
2.  Buat branch untuk fitur Anda (`git checkout -b feature/nama-fitur`).
3.  Commit perubahan Anda (`git commit -m 'Tambahkan fitur baru'`).
4.  Push ke branch Anda (`git push origin feature/nama-fitur`).
5.  Buat Pull Request.
