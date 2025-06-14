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

    public function siswa()
    {
        return $this->hasMany(siswa::class, 'id_kelas', 'id_kelas');
    }

    public function jadwal()
    {
        return $this->hasMany(jadwal::class, 'id_kelas', 'id_kelas');
    }
}
