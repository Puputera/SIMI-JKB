<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Prodi;
use App\Models\Magang;

class Dosen extends Model
{
    protected $fillable = [
        'user_id',
        'prodi_id',
        'nidn',
        'nama',
        'no_hp'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function prodi() {
        return $this->belongsTo(Prodi::class);
    }

    public function magang() {
        return $this->hasMany(Magang::class);
    }
}
