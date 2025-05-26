<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodi = Prodi::with('jurusan')->paginate(5);
        $jurusan = Jurusan::all();
        $startNumber = ($prodi->currentPage() - 1) * $prodi->perPage();
        foreach ($prodi as $index => $item) {
            $item->nomor_urut = $startNumber + $index + 1;
        }
        return view('prodi.index', compact('prodi', 'jurusan'));
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
            'nama' => 'required|string',
            'jurusan_id' => 'required|exists:jurusans,id'
        ]);

        Prodi::create([
            'nama' => $request->nama,
            'jurusan_id' => $request->jurusan_id,
        ]);

        return redirect()->route('prodi.index');
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
            'nama' => 'required|string',
            'jurusan_id' => 'required|exists:jurusans,id'
        ]);

        $prodi = Prodi::findOrFail($id);
        $prodi->update([
            'nama' => $request->nama,
            'jurusan_id' => $request->jurusan_id,
        ]);

        return redirect()->route('prodi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prodi = Prodi::findOrFail($id);
        $prodi->delete();

        return redirect()->route('prodi.index');
    }
}
