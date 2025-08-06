<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiMhs extends Model
{
    protected $fillable = [
        'magang_id',
        'total_nilai_perusahaan',
        'rata_nilai_perusahaan',
        'total_nilai_dosen',
        'rata_nilai_dosen',
        'total_nilai_akhir',
        'rata_nilai_akhir',
        'catatan_perusahaan',
        'catatan_dosen'
    ];

    public function magang()
    {
        return $this->belongsTo(Magang::class);
    }
}
