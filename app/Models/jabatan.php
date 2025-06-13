<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jabatan extends Model
{
    protected $fillable = [
        'id_jabatan',
        'nama_jabatan'
    ];
    protected $table = 'jabatan';
    public $timestamps = false;
}
