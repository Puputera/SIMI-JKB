@extends('app')

@section('title', 'Kuisioner Mahasiswa')

@section('content')
    <h2 class="mb-4 text-2xl font-bold text-gray-900">Kuisioner Mahasiswa</h2>

    <form action="{{ route('kuisionerMahasiswa.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="rekomendasi" class="block text-sm font-medium text-gray-900">REKOMENDASI UNTUK TEMPAT MAGANG?</label>
            <div class="flex items-center gap-4">
                <label class="inline-flex items-center">
                    <input type="radio" name="rekomendasi" value="1"
                        class="border-gray-300 text-blue-600 focus:ring-blue-500">
                    <span class="ml-2 text-sm text-gray-700">Ya</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="rekomendasi" value="0"
                        class="border-gray-300 text-red-600 focus:ring-red-500">
                    <span class="ml-2 text-sm text-gray-700">Tidak</span>
                </label>
            </div>
        </div>
        <div class="mb-4">
            <label for="tipe_pekerjaan" class="block text-sm font-medium text-gray-900">TIPE PEKERJAAN DI TEMPAT MAGANG</label>
            <input type="text" id="tipe_pekerjaan" name="tipe_pekerjaan" required
                class="mt-1 block w-full rounded-lg border border-gray-300 px-4 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                placeholder="misal: coding, UI/UX, multimedia dll">
        </div>
        <div class="mb-4">
            <label for="saran" class="block text-sm font-medium text-gray-900">PENGALAMAN/SARAN</label>
            <input type="text" id="saran" name="saran" required
                class="mt-1 block w-full rounded-lg border border-gray-300 px-4 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                placeholder="Saran untuk selanjutnya">
        </div>
        <div class="flex justify-end space-x-2">
            <button type="submit"
                class="px-5 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                Simpan
            </button>
        </div>
    </form>
@endsection
