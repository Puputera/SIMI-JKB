<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KuisionerPerusahaan extends Model
{
    protected $fillable = [
        'perusahaan_id',
        'nama',
        'jabatan',
        'jumlah_mahasiswa',
        'saran'
    ];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }
}
