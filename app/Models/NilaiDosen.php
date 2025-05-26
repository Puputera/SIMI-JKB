<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiDosen extends Model
{
    protected $fillable = [
        'dosen_id',
        'mahasiswa_id',
        'pertanyaan_id',
        'nilai',
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function pertanyaan()
    {
        return $this->hasMany(PertanyaanNilai::class);
    }
}
