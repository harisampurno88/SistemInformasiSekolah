<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class matapelajaran extends Model
{
    protected $fillable = [
        'id_mata_pelajaran',
        'nama_mata_pelajaran',
        'kkm'
    ];
    protected $table = 'matapelajaran';
    public $timestamps = false;
}
