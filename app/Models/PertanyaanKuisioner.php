<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PertanyaanKuisioner extends Model
{
    protected $fillable = [
        'pertanyaan',
        'pengisi'
    ];
}
