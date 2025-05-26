<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiPerusahaan extends Model
{
    protected $fillable = [
        'perusahaan_id',
        'mahasiswa_id',
        'pertanyaan_id',
        'nilai',
    ];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
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
