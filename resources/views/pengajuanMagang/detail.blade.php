<!-- Main modal -->
<div id="modal-{{ $item->id }}" tabindex="-1" aria-hidden="true"
    class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
    <div class="relative max-h-full w-full max-w-md p-4">
        <!-- Modal content -->
        <div class="relative rounded-lg bg-white shadow-sm">
            <!-- Modal header -->
            <div class="flex items-center justify-between rounded-t border-b border-gray-200 p-4 md:p-5">
                <h3 class="text-lg font-semibold text-gray-900">
                    Detail Pengajuan
                </h3>
                <button type="button"
                    class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900"
                    data-modal-toggle="modal-{{ $item->id }}">
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <!-- Modal body -->
            <div class="space-y-4 p-4 md:p-5">
                <div class="space-y-3">
                    <div class="flex items-start gap-4">
                        <label class="w-1/3 text-sm font-medium text-gray-900">Nama Mahasiswa</label>
                        <p class="w-2/3 text-sm text-gray-700">{{ $item->mahasiswa->nama }}</p>
                    </div>
                    <div class="flex items-start gap-4">
                        <label class="w-1/3 text-sm font-medium text-gray-900">Nama Perusahaan</label>
                        <p class="w-2/3 text-sm text-gray-700">{{ $item->perusahaan->nama }}</p>
                    </div>

                    <div class="flex items-start gap-4">
                        <label class="w-1/3 text-sm font-medium text-gray-900">Alamat</label>
                        <p class="w-2/3 text-sm text-gray-700">{{ $item->perusahaan->alamat }}</p>
                    </div>

                    <div class="flex items-start gap-4">
                        <label class="w-1/3 text-sm font-medium text-gray-900">Email</label>
                        <p class="w-2/3 text-sm text-gray-700">{{ $item->perusahaan->email }}</p>
                    </div>

                    <div class="flex items-start gap-4">
                        <label class="w-1/3 text-sm font-medium text-gray-900">Tertuju</label>
                        <p class="w-2/3 text-sm text-gray-700">{{ $item->tertuju }}</p>
                    </div>

                    <div class="flex items-start gap-4">
                        <label class="w-1/3 text-sm font-medium text-gray-900">Contact Person</label>
                        <p class="w-2/3 text-sm text-gray-700">{{ $item->contact_person }}</p>
                    </div>

                    <div class="flex items-start gap-4">
                        <label class="w-1/3 text-sm font-medium text-gray-900">No HP CP</label>
                        <p class="w-2/3 text-sm text-gray-700">{{ $item->no_hpcp }}</p>
                    </div>

                    <div class="flex items-start gap-4">
                        <label class="w-1/3 text-sm font-medium text-gray-900">Tanggal Mulai</label>
                        <p class="w-2/3 text-sm text-gray-700">
                            {{ \Carbon\Carbon::parse($item->mulai)->format('d M Y') }}</p>
                    </div>

                    <div class="flex items-start gap-4">
                        <label class="w-1/3 text-sm font-medium text-gray-900">Tanggal Selesai</label>
                        <p class="w-2/3 text-sm text-gray-700">
                            {{ \Carbon\Carbon::parse($item->selesai)->format('d M Y') }}</p>
                    </div>

                    <div class="flex items-start gap-4">
                        <label class="w-1/3 text-sm font-medium text-gray-900">Deskripsi</label>
                        <p class="w-2/3 text-sm text-gray-700">{{ $item->deskripsi ?? '-' }}</p>
                    </div>

                    <div class="flex items-start gap-4">
                        <label class="w-1/3 text-sm font-medium text-gray-900">Status</label>
                        <p class="w-2/3 text-sm text-gray-700">
                            @if ($item->status === 1)
                                <span class="font-semibold text-green-600">Diterima</span>
                            @elseif ($item->status === 0)
                                <span class="font-semibold text-red-600">Ditolak</span>
                            @else
                                <span class="font-semibold text-yellow-600">Menunggu Persetujuan</span>
                            @endif
                        </p>
                    </div>

                    <div class="flex items-start gap-4">
                        <label class="w-1/3 text-sm font-medium text-gray-900">Alasan Ditolak</label>
                        <p class="w-2/3 text-sm text-gray-700">{{ $item->alasan ?? '-' }}</p>
                    </div>
                </div>

                <div class="flex justify-end space-x-2 pt-4">
                    @if ($user->role === 'kps')
                        <button type="button" data-modal-target="modal-tolak-{{ $item->id }}"
                            data-modal-toggle="modal-tolak-{{ $item->id }}"
                            data-modal-hide="modal-{{ $item->id }}"
                            class="inline-flex items-center rounded-lg bg-red-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                            Tolak
                        </button>
                        <form action="{{ route('pengajuanMagang.updateStatus', $item->id) }}" method="POST"
                            class="m-0 flex gap-3 p-0">
                            @csrf
                            @method('PUT')
                            <button type="submit" name="status" value="1"
                                class="inline-flex items-center rounded-lg bg-green-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-300 dark:focus:ring-green-900">
                                Terima
                            </button>
                        </form>
                    @else
                        <button type="button"
                            class="inline-flex items-center rounded-lg bg-red-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-300"
                            data-modal-hide="modal-{{ $item->id }}">
                            Tutup
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@include('pengajuanMagang.alasan')