<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
        protected $fillable = [
        'nip',
        'nama',
        'jenis_kelamin',
        'alamat',
        'no_telepon',
        'id_mata_pelajaran',
        'jabatan',
    ];
    protected $table = 'guru';
    public $timestamps = false;
}
