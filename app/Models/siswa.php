<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $fillable = [
        'nisn',
        'nama',
        'jenis_kelamin',
        'alamat',
        'no_telepon',
        'id_kelas',
        'id_tahun_ajaran'
    ];
    protected $table = 'siswa';
    public $timestamps = false;
}
