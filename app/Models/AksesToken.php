<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AksesToken extends Model
{
    protected $fillable = [
        'perusahaan_id',
        'link_akses',
        'kadaluarsa'
    ];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }
}
