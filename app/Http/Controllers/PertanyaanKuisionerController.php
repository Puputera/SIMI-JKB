<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PertanyaanKuisioner;

class PertanyaanKuisionerController extends Controller
{
    public function index()
    {
        $pertanyaanKuisioner = PertanyaanKuisioner::paginate(10);
        $startNumber = ($pertanyaanKuisioner->currentPage() - 1) * $pertanyaanKuisioner->perPage();
        foreach ($pertanyaanKuisioner as $index => $item) {
            $item->nomor_urut = $startNumber + $index + 1;
        }

        return view('pertanyaanKuisioner.index', compact('pertanyaanKuisioner'));
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
        ]);

        PertanyaanKuisioner::create([
            'pertanyaan' => $request->pertanyaan,
        ]);

        return redirect()->route('pertanyaanKuisioner.index');
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
        ]);

        $pertanyaanKuisioner = PertanyaanKuisioner::findOrFail($id);

        $pertanyaanKuisioner->update([
            'pertanyaan' => $request->pertanyaan,
        ]);

        return redirect()->route('pertanyaanKuisioner.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pertanyaanKuisioner = PertanyaanKuisioner::findOrFail($id);

        $pertanyaanKuisioner->delete();
        return redirect()->route('pertanyaanKuisioner.index');
    }
}
