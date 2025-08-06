<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'username' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
            ],
            [
                'username' => 'Jurusan',
                'email' => 'jurusan@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'jurusan',
            ],
            [
                'username' => 'Mahasiswa 1',
                'email' => 'mahasiswa1@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'mahasiswa',
            ],
            [
                'username' => 'Kaprodi 1',
                'email' => 'kaprodi@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'kps',
            ],
            [
                'username' => 'dosen 1',
                'email' => 'dosen1@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'dosen',
            ],
        ]);
    }
}
