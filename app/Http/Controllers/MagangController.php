<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Magang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MagangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
       
        if ($user->role === 'mahasiswa') {
            $mahasiswa = $user->mahasiswa;
            $magang = Magang::where('mahasiswa_id', $mahasiswa->id)->paginate(10);
        } 
        else if ($user->role === 'dosen'){
            $dosen = $user->dosen;
            $magang = Magang::where('dosen_id', $dosen->id)->paginate(10);
        } else {
            $magang = Magang::with('mahasiswa')->paginate(10);
        }
        $startNumber = ($magang->currentPage() - 1) * $magang->perPage();
        foreach ($magang as $index => $item) {
            $item->nomor_urut = $startNumber + $index + 1;
        }
        $prodiIds = $magang->pluck('mahasiswa.prodi_id');        
        $dosen = Dosen::whereIn('prodi_id', $prodiIds)->get();
        
        return view('magang.index', compact('magang', 'dosen'));
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
        //
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
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function updateDosen(Request $request, string $id)
    {
        $request->validate([
            'dosen_id' => 'required|exists:dosens,id',
        ]);
        
        $magang = Magang::findOrFail($id);
        $magang->update([
            'dosen_id' => $request->dosen_id
        ]);

        return redirect()->route('magang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
