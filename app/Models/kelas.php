<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    protected $fillable = [
        'id_kelas',
        'nama_kelas',
        'tingkat',
        'jurusan',
        'id_wali_kelas',
    ];
    protected $table = 'kelas';
    public $timestamps = false;
}
