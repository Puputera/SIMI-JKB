<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Prodi;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosen = Dosen::with('prodi')->paginate(10);
        $startNumber = ($dosen->currentPage() - 1) * $dosen->perPage();
        foreach ($dosen as $index => $item) {
            $item->nomor_urut = $startNumber + $index + 1;
        }
        return view('dosen.index', compact('dosen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = Prodi::get();
        return view('dosen.create', compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'prodi_id' => 'required|integer',
            'nidn' => 'required|string',
            'nama' => 'required|string',
            'no_hp' => 'required|string',
            'email' => 'required'
        ]);

        $user = User::create([
            'username' => $request->nama, 
            'email' => $request->email,
            'password' => Hash::make('12345678'),
            'role' => 'dosen'
        ]);

        Dosen::create([
            'user_id' => $user->id,
            'prodi_id' => $request->prodi_id,
            'nidn' => $request->nidn,
            'nama' => $request->nama,
            'no_hp' => $request->no_hp
        ]);

        return redirect()->route('dosen.index');
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
        $dosen = Dosen::with('user')->findOrFail($id);
        $prodi = Prodi::get();
        return view('dosen.edit', compact('dosen', 'prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nidn' => 'required|string',
            'nama' => 'required|string',
            'no_hp' => 'required|string',
            'password' => 'nullable|string|min:8'
        ]);

        $dosen = Dosen::findOrFail($id);
        $user = $dosen->user;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
    
        $dosen->update([
            'prodi_id' => $request->prodi_id ?: $dosen->prodi_id,
            'nidn' => $request->nidn,
            'nama' => $request->nama,
            'no_hp' => $request->no_hp
        ]);
        return redirect()->route('dosen.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dosen = Dosen::findOrFail($id);
        if ($dosen->user) {
            $dosen->user->delete();
        }
    
        $dosen->delete();
        return redirect()->route('dosen.index');
    }
}
