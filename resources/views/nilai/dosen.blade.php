<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
    </head>

    <body class="bg-gray-100 p-6">
        <div class="mx-auto max-w-3xl rounded-lg bg-white p-6 shadow">
            <div class="mx-auto mb-4 max-w-4xl border-b-4 border-black pb-2 text-center">
                <div class="flex items-center justify-center space-x-4">
                    <!-- Logo (ganti src dengan path gambar logo kamu) -->
                    <img src="images/pnc.png" alt="Logo PNC" class="h-20 w-20">

                    <div class="text-sm leading-tight sm:text-base">
                        <p class="font-medium uppercase">Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi</p>
                        <p class="text-lg font-bold uppercase sm:text-xl">Politeknik Negeri Cilacap</p>
                        <p class="text-[13px] sm:text-sm">
                            Jalan Dr. Soetomo No. 1, Sidakaya-CILACAP 53212 Jawa Tengah <br>
                            Telepone: (0282) 533329, Fax: (0282) 537992<br>
                            <a href="https://www.pnc.ac.id" class="text-blue-600 underline">www.pnc.ac.id</a>,
                            Email: <a href="mailto:sekretariat@pnc.ac.id"
                                class="text-blue-600 underline">sekretariat@pnc.ac.id</a>
                        </p>
                    </div>
                </div>
            </div>

            <h3 class="mb-2 text-center text-base font-bold text-gray-900">PENILAIAN SIDANG MAGANG INDUSTRI</h3>

            <div class="mx-auto mb-4 max-w-2xl space-y-1 text-sm text-gray-800">
                <p class = "font-medium">Hasil Evaluasi Seminar Magang Industri untuk Mahasiswa:</p>
                <div class="flex">
                    <div class="w-48 font-medium">Nama Mahasiswa</div>
                    <div class="w-4">:</div>
                    <p class="flex-1">{{ $magang->mahasiswa->nama }}</p>
                </div>
                <div class="flex">
                    <div class="w-48 font-medium">Judul Laporan</div>
                    <div class="w-4">:</div>
                    <p class="flex-1"></p>
                </div>
                <div class="flex">
                    <div class="w-48 font-medium">Hari/Tanggal</div>
                    <div class="w-4">:</div>
                    <p class="flex-1"></p>
                </div>
                <div class="flex">
                    <div class="w-48 font-medium">Waktu</div>
                    <div class="w-4">:</div>
                    <p class="flex-1"></p>
                </div>
                <div class="flex items-start">
                    <div class="w-48 font-medium">Ruangan</div>
                    <div class="w-4">:</div>
                    <p class="flex-1"></p>
                </div>
            </div>

            <form action="{{ route('nilaiDosen.store') }}" method="POST">
                @csrf
                <table class="min-w-full table-auto border border-gray-400">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-400 px-4 py-2 text-left text-sm font-semibold text-gray-700">
                                No</th>
                            <th class="border border-gray-400 px-4 py-2 text-left text-sm font-semibold text-gray-700">
                                Pertanyaan</th>
                            <th class="border border-gray-400 px-4 py-2 text-left text-sm font-semibold text-gray-700">
                                Range Nilai</th>
                            <th class="border border-gray-400 px-4 py-2 text-left text-sm font-semibold text-gray-700">
                                Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pertanyaan as $index => $item)
                            <tr>
                                <td class="border border-gray-400 px-4 py-2 text-sm text-gray-700">{{ $index + 1 }}
                                </td>
                                <td class="border border-gray-400 px-4 py-2 text-sm text-gray-900">
                                    {{ $item->pertanyaan }}</td>
                                <td class="border border-gray-400 px-4 py-2">
                                    <p class="text-sm font-semibold text-gray-700">0-100</p>
                                </td>
                                <td class="border border-gray-400 px-4 py-2">
                                    <input type="number" name="nilai[{{ $item->id }}]" min="0"
                                        max="100"
                                        class="w-24 rounded border border-gray-300 px-2 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        placeholder="0-100">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-6 max-w-sm text-sm text-gray-800">
                    <table class="w-full border border-black text-center">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-black px-2 py-1" colspan="2">Range Nilai</th>
                                <th class="border border-black px-2 py-1">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-black px-2 py-1">80,0</td>
                                <td class="border border-black px-2 py-1">100</td>
                                <td class="border border-black px-2 py-1">Sangat Istimewa</td>
                            </tr>
                            <tr>
                                <td class="border border-black px-2 py-1">75,0</td>
                                <td class="border border-black px-2 py-1">79,9</td>
                                <td class="border border-black px-2 py-1">Istimewa</td>
                            </tr>
                            <tr>
                                <td class="border border-black px-2 py-1">65</td>
                                <td class="border border-black px-2 py-1">74,9</td>
                                <td class="border border-black px-2 py-1">Baik</td>
                            </tr>
                            <tr>
                                <td class="border border-black px-2 py-1">60,0</td>
                                <td class="border border-black px-2 py-1">64,9</td>
                                <td class="border border-black px-2 py-1">Cukup Baik</td>
                            </tr>
                            <tr>
                                <td class="border border-black px-2 py-1">50</td>
                                <td class="border border-black px-2 py-1">59,9</td>
                                <td class="border border-black px-2 py-1">Cukup</td>
                            </tr>
                            <tr>
                                <td class="border border-black px-2 py-1">40</td>
                                <td class="border border-black px-2 py-1">49,9</td>
                                <td class="border border-black px-2 py-1">Kurang</td>
                            </tr>
                            <tr>
                                <td class="border border-black px-2 py-1">0</td>
                                <td class="border border-black px-2 py-1">39,9</td>
                                <td class="border border-black px-2 py-1">Gagal</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-6 flex justify-end space-x-2">
                    <button type="submit"
                        class="rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                        Simpan
                    </button>
                </div>
            </form>
        </div>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </body>

</html>
