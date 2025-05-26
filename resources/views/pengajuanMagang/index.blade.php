@extends('app')

@section('title', 'Pengajuan Magang')

@section('content')
    <h2 class="mb-4 text-2xl font-bold leading-none tracking-tight text-gray-900 md:text-4xl">Data Pengajuan Magang</h2>
    <div class="mb-4 flex justify-end">
        <a href="{{ route('pengajuanMagang.create') }}"
            class="flex items-center gap-2 rounded-lg bg-green-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Tambah
        </a>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-left text-sm text-gray-500 rtl:text-right">
            <thead class="bg-gray-50 text-xs uppercase text-gray-700">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">
                        No.
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Nama Mahasiswa
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Nama Perusahaan
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($pengajuan->count() > 0)
                    @foreach ($pengajuan as $item)
                        <tr
                            class="odd:light:bg-gray-900 even:light:bg-gray-800 border-b border-gray-200 odd:bg-white even:bg-gray-50">
                            {{-- Kolom nomor --}}
                            <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                                {{ $item->nomor_urut }}
                            </th>
                            {{-- kolom nama --}}
                            <td class="px-6 py-4">
                                {{ $item->mahasiswa->nama }}
                            </td>
                            {{-- kolom jurusan --}}
                            <td class="px-6 py-4">
                                {{ $item->perusahaan->nama }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($item->status === 1)
                                    <span class="font-semibold text-green-600">Diterima</span>
                                @elseif ($item->status === 0)
                                    <span class="font-semibold text-red-600">Ditolak</span>
                                @else
                                    <span class="font-semibold text-yellow-600">Menunggu Persetujuan</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2 justify-center">
                                    <button type="button" data-modal-target="modal-{{ $item->id }}"
                                        data-modal-toggle="modal-{{ $item->id }}" {{-- onclick="edit({{ $item->id }})" --}}
                                        class="flex items-center gap-2 rounded-lg bg-yellow-400 px-4 py-2 text-sm font-medium text-white hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                        </svg>
                                        <span>Detail</span>
                                    </button>
                                    @include('pengajuanMagang.detail')
                                    @if ($item->status === 1)
                                        {{-- Tombol Cetak --}}
                                        <button type="button" {{-- data-modal-target="delete-modal" data-modal-toggle="delete-modal" --}} {{-- onclick="destroy({{ $item->id }})" --}}
                                            class="flex items-center gap-2 rounded-lg bg-blue-500 px-4 py-2 text-sm font-medium text-white hover:bg-blue-600 focus:ring-4 focus:ring-blue-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" />
                                            </svg>
                                            <span>Cetak</span>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">Belum mengajukan</td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{-- pagination --}}
        {{ $pengajuan->links() }}
    </div>

@endsection
