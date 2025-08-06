<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiPerusahaan extends Model
{
    protected $fillable = [
        'nilaimhs_id',
        'pertanyaan_id',
        'nilai',
    ];

    public function nilaiMhs()
    {
        return $this->belongsTo(NilaiMhs::class);
    }
}
