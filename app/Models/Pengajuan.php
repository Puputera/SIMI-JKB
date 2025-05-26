<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $fillable = [
        'mahasiswa_id',
        'perusahaan_id',
        'tertuju',
        'contact_person',
        'no_hpcp',
        'mulai',
        'selesai',
        'deskripsi',
        'status',
        'alasan'
    ];

    public function mahasiswa() {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function perusahaan() {
        return $this->belongsTo(Perusahaan::class);
    }
}
