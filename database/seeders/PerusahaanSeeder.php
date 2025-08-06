<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Perusahaan;

class PerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Perusahaan::create([
            'nama'      => 'PT Teknologi Cerdas',
            'email'     => 'hrd@tekno-cerdas.co.id',
            'alamat'    => 'Jl. Inovasi No. 123',
            'kabupaten' => 'Cilacap',
            'provinsi'  => 'Jawa Tengah',
        ]);
    }
}
