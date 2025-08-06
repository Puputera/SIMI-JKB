<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilKuisionerPerusahaan extends Model
{
    protected $fillable = [
        'kuisioner_perusahaan_id',
        'pertanyaan_kuisioner_id',
        'nilai',
    ];

    public function kuisionerPerusahaan()
    {
        return $this->belongsTo(KuisionerPerusahaan::class);
    }

    public function pertanyaanKuisioner()
    {
        return $this->belongsTo(PertanyaanKuisioner::class);
    }
}
