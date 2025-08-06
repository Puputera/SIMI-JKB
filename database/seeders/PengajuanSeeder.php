<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pengajuan;

class PengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pengajuan::create([
            'mahasiswa_id'    => 1,
            'perusahaan_id'   => 1,
            'tertuju'         => 'HRD PT Maju Mundur',
            'contact_person'  => 'Budi Santoso',
            'no_hpcp'         => '081234567890',
            'mulai'           => '2025-07-01',
            'selesai'         => '2025-09-30',
            'deskripsi'       => 'Pengajuan magang pada bagian pengembangan aplikasi.',
            'status'          => 1, 
            'alasan'          => null,
        ]); 
    }
}
