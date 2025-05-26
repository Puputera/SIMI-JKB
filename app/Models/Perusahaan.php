<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pengajuan;
use App\Models\Magang;
use App\Models\HasilKuisioner;

class Perusahaan extends Model
{
    protected $fillable = [
        'nama',
        'alamat',
        'email'
    ];

    public function pengajuan() {
        return $this->hasMany(Pengajuan::class);
    }

    public function magang() {
        return $this->hasMany(Magang::class);
    }

    // public function hasilKuisioner() {
    //     return $this->hasOne(HasilKuisioner::class);
    // }
}
