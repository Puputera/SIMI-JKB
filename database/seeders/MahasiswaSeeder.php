<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mahasiswa::create([
            'user_id' => '3',
            'prodi_id' => '1',
            'nama' => 'mahasiswa 1',
            'npm' => '220302019',
            'ipk' => 4.00,
            'no_hp' => '0888888'
        ]);
    }
}
