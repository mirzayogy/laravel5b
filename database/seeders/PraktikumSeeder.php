<?php

namespace Database\Seeders;

use App\Models\Praktikum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PraktikumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Praktikum::create([
        //     'periode' => 'GANJIL 2025/2026',
        //     'singkatan' => '251',
        // ]);
        

        // Praktikum::insert([
        //     ['periode' => 'GANJIL 2025/2026', 'singkatan' => '251'],
        //     ['periode' => 'GENAP 2025/2026', 'singkatan' => '252'],
        //     ['periode' => 'GANJIL 2026/2027', 'singkatan' => '261'],
        //     ['periode' => 'GENAP 2026/2027', 'singkatan' => '262'],
        // ]);

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
    }
}
