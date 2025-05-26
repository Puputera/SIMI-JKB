<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Prodi;
use App\Models\Pengajuan;
use App\Models\Magang;

class Mahasiswa extends Model
{
    protected $fillable = [
        'user_id',
        'prodi_id',
        'npm',
        'nama',
        'no_hp',
        'ipk'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function prodi() {
        return $this->belongsTo(Prodi::class);
    }

    public function pengajuan() {
        return $this->hasMany(Pengajuan::class);
    }

    public function magang() {
        return $this->hasOne(Magang::class);
    }
}
