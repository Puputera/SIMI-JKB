<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratBalasan extends Model
{
    protected $fillable = [
        'pengajuan_id',
        'surat'
    ];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class);
    }
}
