## Aplikasi Pencatatan Kegiatan PKL 

Aplikasi Pencatatan Kegiatan PKL adalah sebuah aplikasi berbasis
web yang dibangun menggunakan Yii2 Framework. Aplikasi ini dirancang untuk membantu siswa dan
pembimbing dalam mencatat dan mengelola kegiatan selama Praktik Kerja Lapangan (PKL).

## Fitur

- *Autentikasi Pengguna*: Pengguna dapat mendaftar dan masuk ke dalam aplikasi.
- *Manajemen Pengguna*: Admin dapat menambah, mengedit, dan menghapus pengguna (siswa dan pembimbing).
- *Pencatatan Kegiatan*: Siswa dapat mencatat kegiatan harian selama PKL.

## Teknologi yang Digunakan

- *PHP*: Bahasa pemrograman yang digunakan untuk membangun aplikasi.
- *Yii2 Framework*: Framework PHP yang digunakan untuk pengembangan aplikasi web.
- *MySQL*: Database yang digunakan untuk menyimpan data pengguna dan kegiatan.
- *Bootstrap*: Framework CSS untuk membuat antarmuka pengguna yang responsif dan menarik.

## Prerequisites

Sebelum memulai, pastikan Anda memiliki:

- PHP 7.4 atau lebih tinggi
- Composer
- MySQL
- Web Server (Apache/Nginx)

## Instalasi

1. *Clone Repository*:
   ```bash
   git clone https://github.com/xRullz/jurnal-pkl.git
   cd jurnal-pkl
   
2. *Install Dependencies*:
   ```bash
   composer install
   
3. *Inialisasi Aplikasi*
    - Jalankan perintah berikut untuk menginisialisasi aplikasi:
     ```bash
     php init
    ``` 
    - Pilih opsi Production saat diminta.

4. *Konfigurasi Database*:
   - Ubah file konfigurasi sesuai kebutuhan.
   - Sesuaikan pengaturan database di `common/config/main-local.php`.

5. *Migrasi Database*:
   ```bash
   php yii migrate
   
6. *Akses Aplikasi*:
   - Buka browser dan akses `http://localhost/jurnal-pkl` untuk melihat aplikasi.

## Kontribusi

Jika Anda ingin berkontribusi pada proyek ini, silakan buat fork repository ini dan buat pull request untuk fitur atau perbaikan yang Anda usulkan.
