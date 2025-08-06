@extends('app')

@section('title', 'Magang')

@section('content')
    <h2 class="mb-4 text-2xl font-bold leading-none tracking-tight text-gray-900 md:text-4xl">Data Magang</h2>
    <div class="mb-4 flex justify-end">
        <button type="button" data-modal-target="create-modal" data-modal-toggle="create-modal"
            class="flex items-center gap-2 rounded-lg bg-green-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Tambah
        </button>
    </div>
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
                        Perusahaan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Dosen Pembimbing
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Waktu Mulai
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Waktu Selesai
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($magang)
                    @foreach ($magang as $item)
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
                                @if ($item->dosen_id != null)
                                    {{ $item->dosen->nama }}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->mulai }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->selesai }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    {{-- Tombol Edit --}}
                                    <button type="button" data-modal-target="edit-modal" data-modal-toggle="edit-modal"
                                        onclick="edit({{ $item->id }}, '{{ addslashes($item->dosen_id) }}')"
                                        class="flex items-center gap-2 rounded-lg bg-yellow-400 px-4 py-2 text-sm font-medium text-white hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300">
                                        <svg class="h-5 w-5 text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                            viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                        </svg>
                                        <span>Tambah Pembimbing</span>
                                    </button>

                                    {{-- Tombol Hapus --}}
                                    <a href="{{ route('nilaiDosen.index', ['magang_id' => $item->id]) }}"
                                        class="flex items-center gap-2 rounded-lg bg-blue-700 px-4 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                                         <svg class="h-5 w-5 text-white" aria-hidden="true"
                                              xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                              viewBox="0 0 24 24">
                                             <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                   stroke-width="2"
                                                   d="M12 4v16m8-8H4" />
                                         </svg>
                                         <span>Tambah Nilai</span>
                                     </a>                                     
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" class="py-4 text-center text-gray-500">Belum ada data magang</td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{-- pagination --}}
        {{ $magang->links() }}
    </div>
    @include('magang.edit')

    <script>
        function edit(id, dosen_id) {
            document.getElementById('id').value = id;
            document.getElementById('edit-dosen_id').value = dosen_id;

            let form = document.getElementById('edit-form');
            form.action = "{{ route('magang.updateDosen',  '') }}/" + id;
        }
    </script>
@endsection
