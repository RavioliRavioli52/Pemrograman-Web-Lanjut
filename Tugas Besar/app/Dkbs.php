<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dkbs extends Model
{
    protected $table = 'dkbs';

    protected $fillable = [
        'tahun_akademik_id_tahun_akademik',
        'mata_kuliah_id_mata_kuliah',
        'l_user_id',
        'ruangan_id',
        'hari',
        'kelas',
        'tipe',
        'jam_mulai',
        'jam_selesai',
    ];
}
