<?php

namespace Database\Seeders;

use App\Models\PertanyaanKuisioner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PertanyaanKuisionerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Pertanyaan untuk mahasiswa
            'mahasiswa' => [
                ['pertanyaan' => 'REKOMENDASI UNTUK TEMPAT MAGANG?', 'tipe' => 'boolean'],
                ['pertanyaan' => 'TIPE PEKERJAAN DI TEMPAT MAGANG (misal: coding, UI/UX, multimedia dll)', 'tipe' => 'isian'],
                ['pertanyaan' => 'PENGALAMAN/SARAN', 'tipe' => 'isian'],
            ],

            // Pertanyaan untuk perusahaan
            'perusahaan' => [
                ['pertanyaan' => 'Bagaimana integritas dan motivasi dari mahasiswa Politeknik Negeri Cilacap dalam melaksanakan Magang?', 'tipe' => 'skor'],
                ['pertanyaan' => 'Bagaimana pengamatan Bapak/Ibu terhadap mahasiswa Politeknik Negeri Cilacap dalam melaksanakan magang dilihat dari segi etika/sopan santun?', 'tipe' => 'skor'],
                ['pertanyaan' => 'Bagaimana pendapat Bapak/Ibu terhadap kompetensi dan keahlian mahasiswa Politeknik Negeri Cilacap pada saat Magang?', 'tipe' => 'skor'],
                ['pertanyaan' => 'Bagaimana pendapat Bapak/Ibu terhadap kedisiplinan mahasiswa Politeknik Negeri Cilacap?', 'tipe' => 'skor'],
                ['pertanyaan' => 'Bagaimana respon dan kecepatan pengerjaan dari mahasiswa pada saat mendapat tugas dari perusahaan tempat Magang?', 'tipe' => 'skor'],
                ['pertanyaan' => 'Bagaimana cara beradaptasi dan komunikasi dari mahasiswa Politeknik Negeri Cilacap?', 'tipe' => 'skor'],
                ['pertanyaan' => 'Bagaimana kemampuan kerjasama dalam tim dari mahasiswa Politeknik Negeri Cilacap?', 'tipe' => 'skor'],
                ['pertanyaan' => 'Bagaimana pengembangan diri dan kemauan belajar dari mahasiswa Politeknik Negeri Cilacap?', 'tipe' => 'skor'],
                ['pertanyaan' => 'Bagaimana kemampuan bahasa asing (bahasa Inggris) dari mahasiswa Politeknik Negeri Cilacap?', 'tipe' => 'skor'],
                ['pertanyaan' => 'Bagaimana kemampuan dalam penggunaan teknologi informasi dari mahasiswa Politeknik Negeri Cilacap?', 'tipe' => 'skor'],
            ],
        ];

        foreach ($data as $pengisi => $pertanyaans) {
            foreach ($pertanyaans as $item) {
                PertanyaanKuisioner::create([
                    'pertanyaan' => $item['pertanyaan'],
                    'pengisi' => $pengisi,
                    'tipe' => $item['tipe'],
                ]);
            }
        }
    }
}
