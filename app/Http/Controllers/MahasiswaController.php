<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::with('prodi')->paginate(10);
        $startNumber = ($mahasiswa->currentPage() - 1) * $mahasiswa->perPage();
        foreach ($mahasiswa as $index => $item) {
            $item->nomor_urut = $startNumber + $index + 1;
        }
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = Prodi::get();
        return view('mahasiswa.create', compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'prodi_id' => 'required|integer',
            'npm' => 'required|string',
            'nama' => 'required|string',
            'no_hp' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'ipk' => 'nullable|numeric|min:0|max:4'
        ]);

        $user = User::create([
            'username' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make('12345678'),
            'role' => 'mahasiswa'
        ]);

        Mahasiswa::create([
            'user_id' => $user->id,
            'prodi_id' => $request->prodi_id,
            'npm' => $request->npm,
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'ipk' => $request->ipk ?? 0.00,
        ]);

        return redirect()->route('mahasiswa.index');
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
        $mahasiswa = Mahasiswa::with('user')->findOrFail($id);
        $prodi = Prodi::get();
        return view('mahasiswa.edit', compact('mahasiswa', 'prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'npm' => 'required|string',
            'nama' => 'required|string',
            'no_hp' => 'required|string',
            'password' => 'nullable|string|min:8',
            'ipk' => 'nullable|numeric|min:0|max:4'
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $user = $mahasiswa->user;

        $user->update([
            'username' => $request->nama,
        ]);
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        $mahasiswa->update([
            'prodi_id' => $request->prodi_id ?: $mahasiswa->prodi_id,
            'npm' => $request->npm,
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'ipk' => $request->ipk ?? 0.00,
        ]);
        return redirect()->route('mahasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        if ($mahasiswa->user) {
            $mahasiswa->user->delete();
        }

        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index');
    }
}
