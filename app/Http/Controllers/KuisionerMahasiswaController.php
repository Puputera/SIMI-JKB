<?php

namespace App\Http\Controllers;

use App\Models\KuisionerMahasiswa;
use App\Models\PertanyaanKuisioner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KuisionerMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;
        $sudahMengisi = KuisionerMahasiswa::where('mahasiswa_id', $mahasiswa->id)->exists();

        if ($sudahMengisi) {
            return view('kuisioner.terimakasih');
        }

        $pertanyaan = PertanyaanKuisioner::where('pengisi', 'mahasiswa')->get();

        return view('kuisioner.mahasiswa', compact('pertanyaan', 'mahasiswa'));
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
            'rekomendasi' => 'required|boolean',
            'tipe_pekerjaan' => 'required|string',
            'saran' => 'required|string'
        ]);

        $user = Auth::user();
        $mahasiswa = $user->mahasiswa->id;
        $perusahaan = $user->mahasiswa->magang->perusahaan->id;
        KuisionerMahasiswa::create([
            'perusahaan_id' => $perusahaan,
            'mahasiswa_id' => $mahasiswa,
            'rekomendasi' => $request->rekomendasi,
            'tipe_pekerjaan' => $request->tipe_pekerjaan,
            'saran' => $request->saran,
        ]);

        return redirect()->route('kuisionerMahasiswa.index');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
