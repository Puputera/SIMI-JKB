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
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow">
        <div class="text-center mb-4">
            <h2 class="text-2xl font-bold text-gray-900">ANGKET MONITORING MAGANG INDUSTRI MAHASISWA <br>
            POLITEKNIK NEGERI CILACAP</h2>
        </div>

        <div class="mb-4 max-w-2xl mx-auto text-sm text-gray-800 space-y-1">
            <div class="flex items-center">
                <label class="w-48 font-medium">Nama</label>
                <div class="w-4 text-center">:</div>
                <input type="text" name="nama" class="flex-1 px-2 py-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="flex items-center">
                <label class="w-48 font-medium">Jabatan</label>
                <div class="w-4 text-center">:</div>
                <input type="text" name="jabatan" class="flex-1 px-2 py-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="flex items-center">
                <label class="w-48 font-medium">Perusahaan/Instansi</label>
                <div class="w-4 text-center">:</div>
                <input type="text" name="perusahaan" class="flex-1 px-2 py-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="flex items-center">
                <label class="w-48 font-medium">Alamat</label>
                <div class="w-4 text-center">:</div>
                <input type="text" name="alamat" class="flex-1 px-2 py-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="flex items-center">
                <label class="w-48 font-medium">Jumlah Mahasiswa</label>
                <div class="w-4 text-center">:</div>
                <div class="flex items-center gap-2">
                    <input type="number" name="jumlah_mahasiswa" min="1"
                        class="w-24 px-2 py-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span class="text-gray-700">orang</span>
                </div>
            </div>
        </div>

        <h3 class="text-lg font-bold text-gray-900">Pilihlah salah satu dari nilai</h3>
        <form action="{{ route('kuisionerMahasiswa.store') }}" method="POST">
            @csrf
            @foreach ($pertanyaan as $item)
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-900">{{ $item->pertanyaan }}</label>
                <div class="flex items-center gap-4 mt-2">
                    <div class="flex flex-wrap gap-4 mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" name="nilai[{{ $item->id }}]" value="1"
                                class="border-gray-300 text-red-600 focus:ring-red-500">
                            <span class="ml-2 text-sm text-gray-700">Sangat Buruk</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="nilai[{{ $item->id }}]" value="2"
                                class="border-gray-300 text-orange-500 focus:ring-orange-500">
                            <span class="ml-2 text-sm text-gray-700">Buruk</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="nilai[{{ $item->id }}]" value="3"
                                class="border-gray-300 text-yellow-500 focus:ring-yellow-500">
                            <span class="ml-2 text-sm text-gray-700">Cukup Baik</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="nilai[{{ $item->id }}]" value="4"
                                class="border-gray-300 text-blue-500 focus:ring-blue-500">
                            <span class="ml-2 text-sm text-gray-700">Baik</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="nilai[{{ $item->id }}]" value="5"
                                class="border-gray-300 text-green-600 focus:ring-green-500">
                            <span class="ml-2 text-sm text-gray-700">Sangat Baik</span>
                        </label>
                    </div>                    
                </div>
            </div>
            @endforeach
            <div class="mb-4">
                <label for="saran" class="block text-sm font-medium text-gray-900">Saran/Masukan</label>
                <textarea id="saran" name="saran" rows="4"
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500 text-sm text-gray-900"
                    placeholder="Tuliskan saran atau masukan di sini..."></textarea>
            </div>            
            <div class="flex justify-end space-x-2 mt-6">
                <button type="submit"
                    class="px-5 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</body>
</html>
