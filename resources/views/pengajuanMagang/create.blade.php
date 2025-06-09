@extends('app')

@section('title', 'Pengajuan Magang')

@section('content')
    <h2 class="mb-6 text-2xl font-bold text-gray-900">Pengajuan Magang</h2>

    <form action="{{ route('pengajuanMagang.store') }}" method="POST" class="space-y-4">
        @csrf
        {{-- Nama Perusahaan --}}
        <div>
            <label for="nama_perusahaan" class="mb-2 block text-sm font-medium text-gray-900">Nama Perusahaan</label>
            <input list="daftar-perusahaan" id="nama_perusahaan" name="nama_perusahaan"
                class="block w-full rounded-lg border border-gray-300 bg-white p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                placeholder="Ketik nama perusahaan">
            <datalist id="daftar-perusahaan">
                @foreach ($perusahaan as $item)
                    <option value="{{ $item->nama }}"></option>
                @endforeach
            </datalist>
        </div>

        {{-- Email Perusahaan --}}
        <div>
            <label for="email" class="mb-2 block text-sm font-medium text-gray-900">Email</label>
            <input type="email" id="email" name="email"
                class="block w-full rounded-lg border border-gray-300 bg-white p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                placeholder="Email perusahaan">
        </div>

        {{-- Alamat Perusahaan --}}
        <div>
            <label for="alamat" class="mb-2 block text-sm font-medium text-gray-900">Alamat</label>
            <input type="text" id="alamat" name="alamat"
                class="block w-full rounded-lg border border-gray-300 bg-white p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                placeholder="Alamat perusahaan">
        </div>
        <div>
            <label for="kabupaten" class="mb-2 block text-sm font-medium text-gray-900">Kabupaten</label>
            <input type="text" id="kabupaten" name="kabupaten"
                class="block w-full rounded-lg border border-gray-300 bg-white p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                placeholder="Alamat perusahaan">
        </div>
        <div>
            <label for="provinsi" class="mb-2 block text-sm font-medium text-gray-900">Provinsi</label>
            <input type="text" id="provinsi" name="provinsi"
                class="block w-full rounded-lg border border-gray-300 bg-white p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                placeholder="Alamat perusahaan">
        </div>

        {{-- Tertuju --}}
        <div>
            <label for="tertuju" class="mb-2 block text-sm font-medium text-gray-900">Tertuju Kepada</label>
            <input type="text" id="tertuju" name="tertuju" required
                class="block w-full rounded-lg border border-gray-300 bg-white p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                placeholder="Contoh: HRD, Kepala Divisi, dll">
        </div>

        {{-- Contact Person --}}
        <div>
            <label for="contact_person" class="mb-2 block text-sm font-medium text-gray-900">Contact Person</label>
            <input type="text" id="contact_person" name="contact_person" required
                class="block w-full rounded-lg border border-gray-300 bg-white p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500">
        </div>

        {{-- No HP CP --}}
        <div>
            <label for="no_hpcp" class="mb-2 block text-sm font-medium text-gray-900">No HP CP</label>
            <input type="text" id="no_hpcp" name="no_hpcp" required
                class="block w-full rounded-lg border border-gray-300 bg-white p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500">
        </div>

        {{-- Tanggal Mulai --}}
        <div>
            <label for="mulai" class="mb-2 block text-sm font-medium text-gray-900">Tanggal Mulai</label>
            <input type="date" id="mulai" name="mulai" required
                class="block w-full rounded-lg border border-gray-300 bg-white p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500">
        </div>

        {{-- Tanggal Selesai --}}
        <div>
            <label for="selesai" class="mb-2 block text-sm font-medium text-gray-900">Tanggal Selesai</label>
            <input type="date" id="selesai" name="selesai" required
                class="block w-full rounded-lg border border-gray-300 bg-white p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500">
        </div>

        {{-- Deskripsi --}}
        <div>
            <label for="deskripsi" class="mb-2 block text-sm font-medium text-gray-900">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" rows="3"
                class="block w-full rounded-lg border border-gray-300 bg-white p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                placeholder="Tambahkan keterangan jika ada..."></textarea>
        </div>

        {{-- Tombol --}}
        <div class="flex justify-end space-x-2">
            <a href="{{ route('pengajuanMagang.index') }}"
                class="rounded-lg bg-gray-200 px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-300">
                Batal
            </a>
            <button type="submit"
                class="rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                Simpan
            </button>
        </div>
    </form>

    <script>
        const perusahaanData = @json($perusahaan);

        document.getElementById('nama_perusahaan').addEventListener('input', function() {
            const inputValue = this.value.trim();
            const match = perusahaanData.find(p => p.nama.toLowerCase().includes(inputValue.toLowerCase()));

            if (match) {
                document.getElementById('email').value = match.email ?? '';
                document.getElementById('alamat').value = match.alamat ?? '';
                document.getElementById('kabupaten').value = match.kabupaten ?? '';
                document.getElementById('provinsi').value = match.provinsi ?? '';
            } else {
                document.getElementById('email').value = '';
                document.getElementById('alamat').value = '';
                document.getElementById('kabupaten').value = '';
                document.getElementById('provinsi').value = '';
            }
        });
    </script>
@endsection
