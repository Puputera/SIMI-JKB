<aside id="logo-sidebar"
    class="fixed left-0 top-0 z-40 h-screen w-64 -translate-x-full border-r border-gray-200 bg-white pt-20 transition-transform sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full overflow-y-auto bg-white px-3 pb-4">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="#"
                    class="{{ request()->routeIs('') ? 'bg-blue-700 text-white' : 'hover:bg-gray-200' }} flex items-center rounded-lg p-2 text-gray-900">
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            @if (auth()->user()->role === 'admin')
                <li>
                    <a href="{{ route('user.index') }}"
                        class="{{ request()->routeIs('user.index') ? 'bg-blue-700 text-white' : 'hover:bg-gray-200' }} flex items-center rounded-lg p-2 text-gray-900">
                        <span class="ms-3 flex-1 whitespace-nowrap">Pengguna</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('jurusan.index') }}"
                        class="{{ request()->routeIs('jurusan.index') ? 'bg-blue-700 text-white' : 'hover:bg-gray-200' }} flex items-center rounded-lg p-2 text-gray-900">
                        <span class="ms-3 flex-1 whitespace-nowrap">Jurusan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('prodi.index') }}"
                        class="{{ request()->routeIs('prodi.index') ? 'bg-blue-700 text-white' : 'hover:bg-gray-200' }} flex items-center rounded-lg p-2 text-gray-900">
                        <span class="ms-3 flex-1 whitespace-nowrap">Program Studi</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('mahasiswa.index') }}"
                        class="{{ request()->routeIs('mahasiswa.index') ? 'bg-blue-700 text-white' : 'hover:bg-gray-200' }} flex items-center rounded-lg p-2 text-gray-900">
                        <span class="ms-3 flex-1 whitespace-nowrap">Mahasiswa</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dosen.index') }}"
                        class="{{ request()->routeIs('dosen.index') ? 'bg-blue-700 text-white' : 'hover:bg-gray-200' }} flex items-center rounded-lg p-2 text-gray-900">
                        <span class="ms-3 flex-1 whitespace-nowrap">Dosen</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('perusahaan.index') }}"
                        class="{{ request()->routeIs('perusahaan.index') ? 'bg-blue-700 text-white' : 'hover:bg-gray-200' }} flex items-center rounded-lg p-2 text-gray-900">
                        <span class="ms-3 flex-1 whitespace-nowrap">Perusahaan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pertanyaanNilai.index') }}"
                        class="{{ request()->routeIs('pertanyaanNilai.index') ? 'bg-blue-700 text-white' : 'hover:bg-gray-200' }} flex items-center rounded-lg p-2 text-gray-900">
                        <span class="ms-3 flex-1 whitespace-nowrap">Pertanyaan Nilai</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pertanyaanKuisioner.index') }}"
                        class="{{ request()->routeIs('pertanyaanKuisioner.index') ? 'bg-blue-700 text-white' : 'hover:bg-gray-200' }} flex items-center rounded-lg p-2 text-gray-900">
                        <span class="ms-3 flex-1 whitespace-nowrap">Pertanyaan Kuisioner</span>
                    </a>
                </li>
            @endif

            <li>
                <a href="{{ route('pengajuanMagang.index') }}"
                    class="{{ request()->routeIs('pengajuanMagang.index') ? 'bg-blue-700 text-white' : 'hover:bg-gray-200' }} flex items-center rounded-lg p-2 text-gray-900">
                    <span class="ms-3 flex-1 whitespace-nowrap">Pengajuan Magang</span>
                </a>
            </li>

            <li>
                <a href="{{ route('pengajuanMagang.index') }}"
                    class="{{ request()->routeIs('pengajuanMagang.index') ? 'bg-blue-700 text-white' : 'hover:bg-gray-200' }} flex items-center rounded-lg p-2 text-gray-900">
                    <span class="ms-3 flex-1 whitespace-nowrap">Surat Balasan Magang</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
