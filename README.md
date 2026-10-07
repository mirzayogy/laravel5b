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

atau jika ingin mengulang pembuatan database

```bash
php artisan migrate:fresh
```

## Membuat Paket

Jalankan perintah berikut untuk membuat model, migration, controller (resource), dan seeder

```bash
php artisan make:model Periode -mcrs
```

Resource disini dimaksudkan untuk membuat method resource yang berisikan index, create, store, show, edit, update, dan destroy pada controller.

## Mengubah Model

Pada file model pada `app/Models/Periode` yang dihasilkan, tuliskan:

```php
protected $table = 'periode';
protected $guarded = [];
```

Disini dinyatakan nama tabel karena kita menggunakan tabel dengan Bahasa Indonesia. Sedangkan perintah `guarded = []` digunakan agar seluruh kolom bisa kita kelola.

## Mengubah Migration

Pada file `database/migrations/~_create_periodes_table.php` yang dihasilkan, perhatikan function up:

```php
public function up(): void
{
    Schema::create('periode', function (Blueprint $table) {
        $table->id();
        $table->string('periode');
        $table->string('singkatan');
        $table->boolean('status')->default(false);
        $table->timestamps();
    });
}
```

Pastikan mengganti `periodes` menjadi `periode` dan tambahkan field yang akan digunakan.

Ganti juga pada function down: 

```php
public function down(): void
{
    Schema::dropIfExists('periode');
}
```

## Mengubah Seeder

Tambahkan pada file seeder `database/seeders/PeriodeSeeder`:

```php
use App\Models\Periode;
```

Isi function `run`. Ada beberapa contoh pembuatan seeder diantaranya yang `pertama`:

```php
Periode::create([
    'periode' => 'GANJIL 2025/2026',
    'singkatan' => '251',
]);
Periode::create([
    'periode' => 'GENAP 2025/2026',
    'singkatan' => '252',
]);
Periode::create([
    'periode' => 'GANJIL 2026/2027',
    'singkatan' => '261',
]);
Periode::create([
    'periode' => 'GENAP 2026/2027',
    'singkatan' => '262',
]);
```

`atau` yang kedua:

```php
Praktikum::insert([
    ['periode' => 'GANJIL 2025/2026', 'singkatan' => '251'],
    ['periode' => 'GENAP 2025/2026', 'singkatan' => '252'],
    ['periode' => 'GANJIL 2026/2027', 'singkatan' => '261'],
    ['periode' => 'GENAP 2026/2027', 'singkatan' => '262'],
]);
```

`atau` yang ketiga:

```php
$now = now();

$data = collect([
    ['GANJIL 2025/2026', '251'],
    ['GENAP 2025/2026', '252'],
    ['GANJIL 2026/2027', '261'],
    ['GENAP 2026/2027', '262'],
])->map(fn($item) => [
    'periode' => $item[0],
    'singkatan' => $item[1],
    'created_at' => $now,
    'updated_at' => $now,
])->toArray();

Praktikum::insert($data);
```

Pilih yang menurut anda paling mudah.

Panggil seeder yang sudah kita buat dalam function run pada file `database/seeders/DatabaseSeeder.php`:

```php
public function run(): void
{
    $this->call(PraktikumSeeder::class);
}
```

Jalankan dengan perintah:

```bash
php artisan migrate:fresh --seed
```

alternatif migration untuk menyertakan seeder bisa menggunakan:

```bash
php artisan migrate:fresh --seed --seeder=PeriodeSeeder
```
atau jika satu seeder saja yang ingin dieksekusi bisa menggunakan:

```bash
php artisan db:seed --class=PeriodeSeeder
```

## Mengunduh Template

Pada project ini kita akan menggunakan [AdminLTE](https://adminlte.io). Langkah pertama bisa dilakukan dengan mengunduh template-nya [disini](https://github.com/ColorlibHQ/AdminLTE/releases/download/v4.10.0/admin-lte-v4.10.0.zip). Berikutnya letakkan folder `dist` hasil unduhan tadi di dalam folder `public`.

```text
laravel5a/
├── app/
├── bootstrap/
├── config/
├── database/
├── public/
│   └── dist/
└── ...
```