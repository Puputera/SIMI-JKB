@extends('app')

@section('title', 'Pengguna')

@section('content')
    <h2 class="mb-4 text-2xl font-bold leading-none tracking-tight text-gray-900 md:text-4xl">Surat Balasan Penerimaan Magang</h2>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-left text-sm text-gray-500 rtl:text-right">
            <thead class="bg-gray-50 text-xs uppercase text-gray-700">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Mahasiswa
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Perusahaan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Surat Balasan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Konfirmasi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Alasan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($balasan)
                    @foreach ($balasan as $item)
                        <tr
                            class="odd:light:bg-gray-900 even:light:bg-gray-800 border-b border-gray-200 odd:bg-white even:bg-gray-50">
                            {{-- Kolom nomor --}}
                            <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                                {{ $item->nomor_urut }}
                            </th>
                            {{-- kolom nama --}}
                            <td class="px-6 py-4">
                                {{ $item->pengajuan->mahasiswa->nama }}
                            </td>
                            {{-- kolom jurusan --}}
                            <td class="px-6 py-4">
                                {{ $item->pengajuan->perusahaan->nama }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ asset('storage/surat_balasan/' . $item->surat) }}" target="_blank"
                                    class="text-green-600 underline">
                                    Lihat
                                </a>
                                |
                                <a href="{{ asset('storage/surat_balasan/' . $item->surat) }}" download
                                    class="text-blue-600 underline">
                                    Download
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                @if ($item->konfirmasi === 1)
                                    <span class="font-semibold text-green-600">Telah Dikonfirmasi</span>
                                @elseif ($item->konfirmasi === 0)
                                    <span class="font-semibold text-red-600">Ditolak</span>
                                @else
                                    <span class="font-semibold text-yellow-600">Menunggu Konfirmasi</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if ($item->konfirmasi === 0)
                                    {{ $item->alasan }}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <button type="button" data-modal-target="modal-{{ $item->id }}"
                                        data-modal-toggle="modal-{{ $item->id }}"
                                        class="flex items-center gap-2 rounded-lg bg-yellow-400 px-4 py-2 text-sm font-medium text-white hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300">
                                        <svg class="h-5 w-5 text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                            viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                        </svg>
                                        <span>Konfirmasi</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @include('SuratBalasan.edit')
                    @endforeach
                @endif
            </tbody>
        </table>
        {{-- pagination --}}
        {{ $balasan->links() }}
    </div>
    @include('suratBalasan.create')
@endsection
