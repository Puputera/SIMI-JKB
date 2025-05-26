<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;

class PerusahaanController extends Controller
{
    public function index()
    {
        $perusahaan = Perusahaan::paginate(10);
        $startNumber = ($perusahaan->currentPage() - 1) * $perusahaan->perPage();
        foreach ($perusahaan as $index => $item) {
            $item->nomor_urut = $startNumber + $index + 1;
        }

        return view('perusahaan.index', compact('perusahaan'));
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
            'alamat' => 'required|string',
            'email' => 'required|email'
        ]);

        Perusahaan::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'email' => $request->email,
        ]);

        return redirect()->route('perusahaan.index');
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
            'alamat' => 'required|string',
            'email' => 'required|email'
        ]);

        $perusahaan = Perusahaan::findOrFail($id);

        $perusahaan->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'email' => $request->email,
        ]);

        return redirect()->route('perusahaan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $perusahaan = Perusahaan::findOrFail($id);

        $perusahaan->delete();
        return redirect()->route('perusahaan.index');
    }
}
