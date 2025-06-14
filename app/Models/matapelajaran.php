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

    public function guru()
    {
        return $this->hasMany(guru::class, 'id_mata_pelajaran', 'id_mata_pelajaran');
    }

    public function nilai()
    {
        return $this->hasMany(nilai::class, 'id_mata_pelajaran', 'id_mata_pelajaran');
    }
}
