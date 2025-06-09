<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PertanyaanNilai extends Model
{
    protected $fillable = [
        'pertanyaan',
        'pengisi'
    ];
}
