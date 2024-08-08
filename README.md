<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## How to Install Laravel

# Tutorial Install PHP dan Laravel di Windows

Panduan ini akan membantu kamu menginstal PHP dan Laravel di Windows, serta menyiapkan proyek Laravel dan mengunggahnya ke GitHub.

## 1. Menginstal PHP di Windows

### 1.1. Download PHP
1. Kunjungi [situs resmi PHP](https://windows.php.net/download) dan unduh versi terbaru dari PHP untuk Windows (Non Thread Safe versi zip).
2. Ekstrak file zip ke direktori yang kamu pilih, misalnya `C:\php`.

### 1.2. Konfigurasi PHP
1. Buka folder `C:\php`.
2. Salin file `php.ini-development` dan rename menjadi `php.ini`.
3. Edit file `php.ini` menggunakan teks editor (misalnya Notepad).
   - Cari baris `;extension_dir = "ext"` dan hapus `;` di depannya.
   - Cari dan aktifkan ekstensi berikut dengan menghapus `;` di depannya:
     ```
     extension=curl
     extension=mbstring
     extension=openssl
     extension=pdo_mysql
     ```
   - Simpan dan tutup file `php.ini`.

### 1.3. Tambahkan PHP ke PATH
1. Buka `Control Panel > System and Security > System > Advanced system settings`.
2. Klik `Environment Variables`.
3. Di bagian `System variables`, cari variabel `Path`, lalu klik `Edit`.
4. Tambahkan path ke folder `C:\php`.
5. Klik `OK` untuk menyimpan.

### 1.4. Verifikasi Instalasi PHP
1. Buka Command Prompt (CMD).
2. Ketik `php -v` dan tekan `Enter`.
3. Kamu akan melihat versi PHP jika instalasi berhasil.

## 2. Menginstal Composer

### 2.1. Download dan Install Composer
1. Kunjungi [Composer](https://getcomposer.org/download/) dan unduh Composer-Setup.exe.
2. Jalankan installer dan ikuti petunjuknya.
3. Pastikan untuk memilih `C:\php\php.exe` saat diminta lokasi PHP.

### 2.2. Verifikasi Instalasi Composer
1. Buka CMD.
2. Ketik `composer` dan tekan `Enter`.
3. Kamu akan melihat informasi Composer jika instalasi berhasil.

## 3. Menginstal Laravel

### 3.1. Menggunakan Composer untuk Install Laravel
1. Buka CMD.
2. Arahkan ke folder di mana kamu ingin menyimpan proyek Laravel, misalnya `C:\xampp\htdocs`.
3. Jalankan perintah berikut untuk menginstal Laravel:
   ```bash
   composer create-project --prefer-dist laravel/laravel nama-proyek
