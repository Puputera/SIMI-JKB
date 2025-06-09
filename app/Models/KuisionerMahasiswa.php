<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KuisionerMahasiswa extends Model
{
    protected $fillable = [
        'mahasiswa_id',
        'perusahaan_id',
        'rekomendasi',
        'tipe_pekerjaan',
        'saran'
    ];
}
