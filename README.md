## Persiapan

Matakuliah Pemrograman Berorientasi Objek 2 akan menggunakan Laravel, berikut adalah beberapa file yang perlu dipersiapkan:

- Download [XAMPP](https://www.apachefriends.org/download.html) atau [Laragon](https://laragon.org/download).
- Download [NodeJS](https://nodejs.org/en/download). Boleh yang current maupun yang LTS.
- Download [composer](https://getcomposer.org/download/).

Pada perintah ini dicontohkan kelas yang mengerjakan adalah kelas 5A. Jalankan perintah berikut untuk membuat project Laravel, sesuaikan dengan kelas masing-masing.

```bash
composer create-project laravel/laravel laravel5A
```

Buka file `.env` pada root proyek Laravel.

- Hapus tanda komentar `#` pada baris-baris konfigurasi database di bawahnya.

- Ganti `DB_DATABASE` menjadi `db_pbo2_5A`, lalu simpan file.

Buka `phpMyAdmin` → New → buat database `db_pbo2_5A`.

                                                                                
Jalankan perintah berikut untuk menghubungkan ataupun membuat database jika belum dibuat:

```bash
php artisan migrate
```

atau 

```bash
php artisan migrate:fresh
```