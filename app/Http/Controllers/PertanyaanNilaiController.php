<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PertanyaanNilai;

class PertanyaanNilaiController extends Controller
{
    public function index()
    {
        $pertanyaanNilai = PertanyaanNilai::paginate(10);
        $startNumber = ($pertanyaanNilai->currentPage() - 1) * $pertanyaanNilai->perPage();
        foreach ($pertanyaanNilai as $index => $item) {
            $item->nomor_urut = $startNumber + $index + 1;
        }

        return view('pertanyaanNilai.index', compact('pertanyaanNilai'));
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
            'pertanyaan' => 'required|string',
            'pengisi' => 'required|string',
        ]);

        PertanyaanNilai::create([
            'pertanyaan' => $request->pertanyaan,
            'pengisi' => $request->pengisi,
        ]);

        return redirect()->route('pertanyaanNilai.index');
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
            'pertanyaan' => 'required|string',
            'pengisi' => 'required|string',
        ]);

        $pertanyaanNilai = PertanyaanNilai::findOrFail($id);

        $pertanyaanNilai->update([
            'pertanyaan' => $request->pertanyaan,
            'pengisi' => $request->pengisi,
        ]);

        return redirect()->route('pertanyaanNilai.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pertanyaanNilai = PertanyaanNilai::findOrFail($id);

        $pertanyaanNilai->delete();
        return redirect()->route('pertanyaanNilai.index');
    }
}
