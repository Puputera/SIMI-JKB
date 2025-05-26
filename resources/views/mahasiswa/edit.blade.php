@extends('app')

@section('title', 'Edit Mahasiswa')

@section('content')
    <h2 class="text-2xl font-bold mb-4 text-gray-900">Edit mahasiswa</h2>

    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $mahasiswa->id }}">
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-900">Email</label>
            <input type="email" id="email" name="email" required
                class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                placeholder="Masukkan Email" value="{{ $mahasiswa->user->email }}">
        </div>
        <div class="mb-4">
            <label for="npm" class="block text-sm font-medium text-gray-900">NPM</label>
            <input type="text" id="npm" name="npm" required
                class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                placeholder="Masukkan NPM" value="{{ $mahasiswa->npm  }}">
        </div>
        <div class="mb-4">
            <label for="nama" class="block text-sm font-medium text-gray-900">Nama</label>
            <input type="text" id="nama" name="nama" required
                class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                placeholder="Masukkan Nama" value="{{ $mahasiswa->nama }}">
        </div>
        <div class="mb-4">
            <label for="prodi_id" class="block text-sm font-medium text-gray-900">Program Studi</label>
            <select id="prodi_id" name="prodi_id" required
                class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="{{ $mahasiswa->prodi_id }}" disabled selected>{{ $mahasiswa->prodi->nama }}</option>
                @foreach ($prodi as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="ipk" class="block text-sm font-medium text-gray-900">IPK</label>
            <input type="number" step="0.01" id="ipk" name="ipk" required
                class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                placeholder="0.00" value="{{ $mahasiswa->ipk }}">
        </div>
        <div class="mb-4">
            <label for="no_hp" class="block text-sm font-medium text-gray-900">No HP</label>
            <input type="text" id="no_hp" name="no_hp" required
                class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                placeholder="Masukkan No HP" value="{{ $mahasiswa->no_hp }}">
        </div>
        <div class="flex justify-end space-x-2">
            <a href="{{ route('mahasiswa.index') }}"
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
