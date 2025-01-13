<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PoliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('polis')->delete();
        $poli = [
            ['id' => 1, 'nama' => 'Poli Anak'],
            ['id' => 2, 'nama' => 'Poli Kulit & Kelamin'],
            ['id' => 3, 'nama' => 'Poli Penyakit Dalam'],
            ['id' => 4, 'nama' => 'Poli Kandungan'],
            ['id' => 5, 'nama' => 'Poli Umum']
        ];

        DB::table('polis')->insert($poli);
    }
}
