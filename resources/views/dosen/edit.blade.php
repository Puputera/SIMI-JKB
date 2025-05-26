@extends('app')

@section('title', 'Edit Dosen')

@section('content')
    <h2 class="text-2xl font-bold mb-4 text-gray-900">Edit Dosen</h2>

    <form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $dosen->id }}">
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-900">Email</label>
            <input type="email" id="email" name="email" required
                class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                placeholder="Masukkan Email" value="{{ $dosen->user->email }}">
        </div>
        <div class="mb-4">
            <label for="nidn" class="block text-sm font-medium text-gray-900">NIDN</label>
            <input type="text" id="nidn" name="nidn" required
                class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                placeholder="Masukkan NIDN" value="{{ $dosen->nidn }}">
        </div>
        <div class="mb-4">
            <label for="nama" class="block text-sm font-medium text-gray-900">Nama</label>
            <input type="text" id="nama" name="nama" required
                class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                placeholder="Masukkan Nama" value="{{ $dosen->nama }}">
        </div>
        <div class="mb-4">
            <label for="prodi_id" class="block text-sm font-medium text-gray-900">Program Studi</label>
            <select id="prodi_id" name="prodi_id" required
                class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="{{ $dosen->prodi_id }}" disabled selected>{{ $dosen->prodi->nama }}</option>
                @foreach ($prodi as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="no_hp" class="block text-sm font-medium text-gray-900">No HP</label>
            <input type="text" id="no_hp" name="no_hp" required
                class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                placeholder="Masukkan No HP" value="{{ $dosen->no_hp }}">
        </div>
        <div class="flex justify-end space-x-2">
            <a href="{{ route('dosen.index') }}"
                class="px-5 py-2.5 text-sm font-medium text-gray-900 bg-gray-200 rounded-lg hover:bg-gray-300">
                Batal
            </a>
            <button type="submit"
                class="px-5 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                Simpan
            </button>
        </div>
    </form>
@endsection
