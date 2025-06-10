<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tahunajaran extends Model
{
    protected $fillable = [
        'id_tahun_ajaran',
        'tahun_mulai',
        'tahun_selesai',
        'status'
    ];
    protected $table = 'tahunajaran';
    public $timestamps = false;
}
