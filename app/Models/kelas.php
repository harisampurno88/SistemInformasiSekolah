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
        'nama_guru',
    ];
    protected $table = 'kelas';
    public $timestamps = false;
}
