<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="bg-gray-100 p-6">
        <div class="mx-auto max-w-3xl rounded-lg bg-white p-6 shadow">
            <div class="text-center mb-4">
                <h2 class="text-2xl font-bold text-gray-900">DAFTAR PENILAIAN MAGANG INDUSTRI</h2>
                <h3 class="text-lg font-bold text-gray-900">(Diisi Pembimbing Magang/Lapangan)</h3>
            </div>
            
            <div class="mb-4 max-w-2xl mx-auto text-sm text-gray-800 space-y-1">
                <div class="flex">
                    <div class="w-48 font-medium">Nama Mahasiswa</div>
                    <div class="w-4">:</div>
                    <p class="flex-1">Puput Era</p>
                </div>
                <div class="flex">
                    <div class="w-48 font-medium">NPM</div>
                    <div class="w-4">:</div>
                    <p class="flex-1">220302019</p>
                </div>
                <div class="flex">
                    <div class="w-48 font-medium">Program Studi</div>
                    <div class="w-4">:</div>
                    <p class="flex-1">D3 Teknik Informatika</p>
                </div>
                <div class="flex">
                    <div class="w-48 font-medium">Tempat Magang</div>
                    <div class="w-4">:</div>
                    <p class="flex-1">PT. ERA</p>
                </div>
                <div class="flex items-start">
                    <div class="w-48 font-medium">Petunjuk Pengisian</div>
                    <div class="w-4">:</div>
                    <p class="flex-1">Tuliskan setiap komponen dengan skala nilai sebagaimana yang tercantum di bawah.</p>
                </div>
            </div>            

            <form action="{{ route('kuisionerMahasiswa.store') }}" method="POST">
                @csrf
                <table class="min-w-full table-auto border border-gray-400">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-400 px-4 py-2 text-left text-sm font-semibold text-gray-700">
                                No</th>
                            <th class="border border-gray-400 px-4 py-2 text-left text-sm font-semibold text-gray-700">
                                Pertanyaan</th>
                            <th class="border border-gray-400 px-4 py-2 text-left text-sm font-semibold text-gray-700">
                                Nilai (0-100)</th>
                            <th class="border border-gray-400 px-4 py-2 text-left text-sm font-semibold text-gray-700">
                                Keterangan</th>
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
                                    <input type="number" name="nilai[{{ $item->id }}]" min="0"
                                        max="100"
                                        class="w-24 rounded border border-gray-300 px-2 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        placeholder="0-100">
                                </td>
                                <td class="border border-gray-400 px-4 py-2">
                                    <input type="text" name="keterangan[{{ $item->id }}]"
                                        class="w-full rounded border border-gray-300 px-2 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        placeholder="Tambahkan keterangan">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-8 flex justify-start">
                    <table class="table-fixed text-sm text-gray-800 border border-gray-500">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-gray-500 px-2 py-1 w-24">Huruf Mutu</th>
                                <th class="border border-gray-500 px-2 py-1 w-32">Range Nilai</th>
                                <th class="border border-gray-500 px-2 py-1 w-48">Sebutan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-gray-500 px-2 py-1 text-center">A</td>
                                <td class="border border-gray-500 px-2 py-1 text-center">80 - 100</td>
                                <td class="border border-gray-500 px-2 py-1">Sangat Istimewa</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-500 px-2 py-1 text-center">AB</td>
                                <td class="border border-gray-500 px-2 py-1 text-center">75 - 79,9</td>
                                <td class="border border-gray-500 px-2 py-1">Istimewa</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-500 px-2 py-1 text-center">B</td>
                                <td class="border border-gray-500 px-2 py-1 text-center">65 - 74,9</td>
                                <td class="border border-gray-500 px-2 py-1">Baik</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-500 px-2 py-1 text-center">BC</td>
                                <td class="border border-gray-500 px-2 py-1 text-center">60 - 64,9</td>
                                <td class="border border-gray-500 px-2 py-1">Cukup Baik</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-500 px-2 py-1 text-center">C</td>
                                <td class="border border-gray-500 px-2 py-1 text-center">50 - 59,9</td>
                                <td class="border border-gray-500 px-2 py-1">Cukup</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-500 px-2 py-1 text-center">D</td>
                                <td class="border border-gray-500 px-2 py-1 text-center">40 - 49,9</td>
                                <td class="border border-gray-500 px-2 py-1">Kurang</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-500 px-2 py-1 text-center">E</td>
                                <td class="border border-gray-500 px-2 py-1 text-center">0 - 39,9</td>
                                <td class="border border-gray-500 px-2 py-1">Gagal</td>
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
    </body>

</html>
