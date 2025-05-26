<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Magang extends Model
{
    protected $fillable = [
        'pengajuan_id',
        'perusahaan_id',
        'dosen_id',
        'mahasiswa_id'
    ];
}
