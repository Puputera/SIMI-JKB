<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Dosen;
use App\Models\Mahasiswa;

class Prodi extends Model
{
    protected $fillable = [
        // 'user_id',
        'jurusan_id',
        'nama'
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function dosen()
    {
        return $this->hasMany(Dosen::class);
    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }
}
