<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    protected $fillable = [
        'id_jadwal',
        'id_kelas',
        'nip',
        'id_mata_pelajaran',
        'hari',
        'jam_mulai',
        'jam_selesai'
    ];
    protected $table = 'jadwal';
    public $timestamps = false;
}
