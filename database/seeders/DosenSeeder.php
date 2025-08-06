<?php

namespace Database\Seeders;

use App\Models\Dosen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dosen::create([
            'user_id' => '5',
            'prodi_id' => '1',
            'nama' => 'dosen 1',
            'nidn' => '123456789',
            'no_hp' => '0888888'
        ]);
    }
}
