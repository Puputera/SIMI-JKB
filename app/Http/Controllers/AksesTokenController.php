<?php

namespace App\Http\Controllers;

use App\Models\AksesToken;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Magang;

class AksesTokenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $akses = Perusahaan::whereHas('magang', function ($query) {
                $query->where('selesai', '>=', Carbon::today());
                })
                ->latest()
                ->limit(1)
                ->paginate(10);
        $startNumber = ($akses->currentPage() - 1) * $akses->perPage();
        foreach ($akses as $index => $item) {
            $item->nomor_urut = $startNumber + $index + 1;
        }
        return view('aksesPerusahaan.index', compact('akses'));
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
