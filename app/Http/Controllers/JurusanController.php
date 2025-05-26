<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusan = Jurusan::paginate(10);
        $startNumber = ($jurusan->currentPage() - 1) * $jurusan->perPage();
        foreach ($jurusan as $index => $item) {
            $item->nomor_urut = $startNumber + $index + 1;
        }

        return view('jurusan.index', compact('jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email'
        ]);

        $user = User::create([
            'username' => $request->nama, 
            'email' => $request->email,
            'password' => Hash::make('12345678'),
            'role' => 'jurusan'
        ]);

        Jurusan::create([
            'user_id' => $user->id,
            'nama' => $request->nama,
        ]);

        return redirect()->route('jurusan.index');
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
            // 'user_id' => 'required|integer',
            'nama' => 'required|string',
            // 'password' => 'nullable|string|min:8'
        ]);

        $jurusan = Jurusan::findOrFail($id);
        $user = User::findOrFail($jurusan->user_id);
    
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
    
        $jurusan->update([
            'nama' => $request->nama,
        ]);
        return redirect()->route('jurusan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jurusan = Jurusan::findOrFail($id);
        if ($jurusan->user) {
            $jurusan->user->delete();
        }

        $jurusan->delete();
        return redirect()->route('jurusan.index');
    }
}
