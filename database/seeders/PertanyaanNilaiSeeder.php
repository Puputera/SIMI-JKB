<?php

namespace Database\Seeders;

use App\Models\PertanyaanNilai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PertanyaanNilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Pertanyaan untuk dosen
            'dosen' => [
                'Persiapan seminar magang industri',
                'Sikap dan penampilan',
                'Penguasaan materi dan objektifitas dalam menanggapi pertanyaan',
                'Kemampuan menjelaskan dan mempertahankan ide',
                'Hasil yang dicapai dari pelaksanaan magang industri',
                'Penyajian penulisan laporan magang industri',
            ],

            // Pertanyaan untuk perusahaan
            'perusahaan' => [
                'Kedisiplinan',
                'Kemampuan beradaptasi dengan lingkungan',
                'Tanggung jawab terhadap tugas',
                'Kemandirian',
                'Inisiatif dan kreatifitas',
                'Ketrampilan dalam: Kesesuaian dalam intruksi',
                'Ketrampilan dalam: Kualitas hasil pekerjaan',
                'Ketrampilan dalam: Ketepatan waktu',
                'Ketrampilan dalam: Kemampuan memecahkan masalah',
                'Komunikasi: Kerjasama dengan team work/kelompok',
                'Komunikasi: Hubungan dengan atasan',
                'Komunikasi: Hubungan dengan rekan kerja',
                'Komunikasi: Hubungan dengan relasi',
                'Sikap Potensial: Sikap menghadapi pekerjaan',
                'Sikap Potensial: Disiplin kerja',
                'Sikap Potensial: Loyalitas',
                'Sikap Potensial: Semangat dan motivasi kerja',
                'Sikap Potensial: Penampilan',
            ],
        ];

        foreach ($data as $pengisi => $pertanyaans) {
            foreach ($pertanyaans as $pertanyaan) {
                PertanyaanNilai::create([
                    'pertanyaan' => $pertanyaan,
                    'pengisi' => $pengisi,
                ]);
            }
        }

    }
}
