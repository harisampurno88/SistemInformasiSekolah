<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
        protected $fillable = [
        'nip',
        'nama',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'no_telepon',
        'id_mata_pelajaran',
        'id_jabatan',
    ];
    protected $table = 'guru';
    public $timestamps = false;
}
