<?php

namespace Database\Seeders;

use App\Models\Periode;
use App\Models\Praktikum;
use Illuminate\Database\Seeder;

class PraktikumSeeder extends Seeder
{
    public function run(): void
    {
        $periode = Periode::where('singkatan', '251')->first();

        Praktikum::create([
            'periode_id' => $periode->id,
            'kode' => 'PW1',
            'nama' => 'Pemrograman Web 1',
            'semester' => 3,
            'sifat' => 'Wajib',
        ]);

        Praktikum::create([
            'periode_id' => $periode->id,
            'kode' => 'BD1',
            'nama' => 'Basis Data 1',
            'semester' => 3,
            'sifat' => 'Wajib',
        ]);

        Praktikum::create([
            'periode_id' => $periode->id,
            'kode' => 'MM1',
            'nama' => 'Multimedia',
            'semester' => 5,
            'sifat' => 'Pilihan',
        ]);

        $periode = Periode::where('singkatan', '252')->first();

         Praktikum::create([
            'periode_id' => $periode->id,
            'kode' => 'PW2',
            'nama' => 'Pemrograman Web 2',
            'semester' => 4,
            'sifat' => 'Wajib',
        ]);
    }
}