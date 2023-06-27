<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TahunAkademik extends Model
{
    protected $table = 'tahun_akademik';

    protected $fillable = [
        'id_tahun_akademik',
        'semester',
        'tahun_akademik',
    ];
}
