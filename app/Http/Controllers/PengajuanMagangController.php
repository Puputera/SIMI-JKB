<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;

class PengajuanMagangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->role === 'mahasiswa') {
            $mahasiswaId = $user->mahasiswa->id;

            $pengajuan = Pengajuan::where('mahasiswa_id', $mahasiswaId)->paginate(10);
        } else {
            $pengajuan = Pengajuan::paginate(10);
        }
        $startNumber = ($pengajuan->currentPage() - 1) * $pengajuan->perPage();
        foreach ($pengajuan as $index => $item) {
            $item->nomor_urut = $startNumber + $index + 1;
        }

        return view('pengajuanMagang.index', compact('pengajuan', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $perusahaan = Perusahaan::all();
        return view('pengajuanMagang.create', compact('perusahaan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'alamat'          => 'nullable|string|max:255',
            'email'           => 'nullable|email|max:255',
            'kabupaten'       => 'nullable|string|max:255',
            'provinsi'        => 'nullable|string|max:255',
            'tertuju'         => 'required|string|max:255',
            'contact_person'  => 'required|string|max:255',
            'no_hpcp'         => 'required|string|max:20',
            'mulai'           => 'required|date',
            'selesai'         => 'required|date|after_or_equal:mulai',
            'deskripsi'       => 'nullable|string',
        ]);

        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->firstOrFail();
        $perusahaan = Perusahaan::where('nama', $request->nama_perusahaan)->first();
        if (!$perusahaan) {
            $perusahaan = Perusahaan::create([
                'nama' => $request->nama_perusahaan,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'kabupaten' => $request->kabupaten,
                'provinsi' => $request->provinsi,
            ]);
        }

        $pengajuanExists = Pengajuan::where('mahasiswa_id', $mahasiswa->id)
            ->where('perusahaan_id', $perusahaan->id)
            ->exists();

        if ($pengajuanExists) {
            return redirect()->back()->with('error', 'Pengajuan ke perusahaan ini sudah pernah dibuat.');
        }

        Pengajuan::create([
            'mahasiswa_id'    => $mahasiswa->id,
            'perusahaan_id'   => $perusahaan->id,
            'tertuju'         => $request->tertuju,
            'contact_person'  => $request->contact_person,
            'no_hpcp'         => $request->no_hpcp,
            'mulai'           => $request->mulai,
            'selesai'         => $request->selesai,
            'deskripsi'       => $request->deskripsi,
        ]);

        return redirect()->route('pengajuanMagang.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pengajuan = Pengajuan::findorfail($id);
        return view('pengajuanMagang.create', compact('pengajuan'));
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
    public function update (Request $request, string $id)
    {
        $request->validate([
            'status' => 'required',
            'alasan' => 'nullable|string'
        ]);
        // dd($request->all());

        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->update([
            'status' => $request->status,
            'alasan' => $request->alasan
        ]);

        return redirect()->route('pengajuanMagang.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateStatus (Request $request, string $id)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->status = $request->status;

        if ($request->status == 0) {
            $pengajuan->alasan = $request->alasan;
        } else {
            $pengajuan->alasan = null;
        }

        $pengajuan->save();
        return redirect()->route('pengajuanMagang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       //
    }
}
