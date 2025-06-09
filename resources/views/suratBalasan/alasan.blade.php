<div id="modal-tolak-{{ $item->id }}" tabindex="-1" aria-hidden="true"
    class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
    <div class="relative max-h-full w-full max-w-md p-4">
        <!-- Modal content -->
        <div class="relative rounded-lg bg-white shadow-sm">
            <!-- Modal header -->
            <div class="flex items-center justify-between rounded-t border-b border-gray-200 p-4 md:p-5">
                <h3 class="text-lg font-semibold text-gray-900">
                    Alasan Penolakan
                </h3>
                <button type="button" data-modal-hide="modal-tolak-{{ $item->id }}"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close</span>
                </button>
            </div>

            <!-- Body -->
            <form action="{{ route('suratBalasan.updateKonfirmasi', $item->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="m-4">
                    <label for="alasan" class="block mb-2 text-sm font-medium text-gray-900">Masukkan alasan penolakan:</label>
                    <textarea id="alasan" name="alasan" rows="4" required
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:ring-red-500 focus:border-red-500"></textarea>
                </div>
                <div class=" flex justify-end gap-2 p-4">
                    <button type="button" data-modal-hide="modal-tolak-{{ $item->id }}"
                        class="px-4 py-2 text-sm text-gray-500 bg-gray-100 rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300">
                        Batal
                    </button>
                    <button type="submit" name="konfirmasi" value="0"
                        class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-300">
                        Tolak Pengajuan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>