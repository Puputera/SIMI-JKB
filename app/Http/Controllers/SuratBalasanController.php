<?php

namespace App\Http\Controllers;

use App\Models\SuratBalasan;
use Illuminate\Http\Request;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Magang;

class SuratBalasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $balasan = SuratBalasan::with('pengajuan')->paginate(10);
        $startNumber = ($balasan->currentPage() - 1) * $balasan->perPage();
        foreach ($balasan as $index => $item) {
            $item->nomor_urut = $startNumber + $index + 1;
        }
        $query = Pengajuan::with('mahasiswa', 'perusahaan')
            ->where('status', 1)
            ->whereDoesntHave('suratBalasan');
        $user = Auth::user();

        if ($user->role === 'mahasiswa') {
            $mahasiswaId = $user->mahasiswa->id;
            $query->where('mahasiswa_id', $mahasiswaId);
        }

        $pengajuan = $query->get();

        return view('suratBalasan.index', compact('balasan', 'pengajuan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pengajuan_id' => 'required|exists:pengajuans,id',
            'surat' => 'required|mimes:pdf|max:10240',
        ]);

        $file = $request->file('surat');
        $filename = $this->generateFileName($file);
        $file->storeAs('public/surat_balasan', $filename);

        SuratBalasan::create([
            'pengajuan_id' => $request->pengajuan_id,
            'surat' => $filename,
        ]);

        return redirect()->route('suratBalasan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'pengajuan_id' => 'required|exists:pengajuans,id',
            'surat' => 'nullable|mimes:pdf|max:10240',
        ]);

        $suratBalasan = SuratBalasan::findOrFail($id);
        if ($request->hasFile('surat')) {
            if ($suratBalasan->surat && Storage::exists('public/surat_balasan/' . $suratBalasan->surat)) {
                Storage::delete('public/surat_balasan/' . $suratBalasan->surat);
            }

            $file = $request->file('surat');
            $filename = $this->generateFileName($file);
            $file->storeAs('public/surat_balasan', $filename);
            $suratBalasan->surat = $filename;
        }

        $suratBalasan->pengajuan_id = $request->pengajuan_id;
        $suratBalasan->save();

        return redirect()->route('suratBalasan.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateKonfirmasi(Request $request, string $id)
    {
        $request->validate([
            'konfirmasi' => 'required|boolean',
            'alasan' =>'nullable'
        ]);

        $balasan = SuratBalasan::findOrFail($id);
        $balasan->konfirmasi = $request->konfirmasi;

        if ($request->konfirmasi == 0) {
            $balasan->alasan = $request->alasan;
        } else {
            $balasan->alasan = null;
            $pengajuan = Pengajuan::find($balasan->pengajuan_id);

            Magang::create([
                'pengajuan_id' => $pengajuan->id,
                'mahasiswa_id' => $pengajuan->mahasiswa_id,
                'perusahaan_id' => $pengajuan->perusahaan_id,
                'mulai' => $pengajuan->mulai,
                'selesai' => $pengajuan->selesai,
            ]);
        }

        $balasan->save();
        return redirect()->route('suratBalasan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function generateFileName($file)
    {
        $timestamp = now()->format('Ymd-His');
        $extension = $file->getClientOriginalExtension();
        return 'Suratbalasan-' . $timestamp . '.' . $extension;
    }
}
