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
        'id_guru',
    ];
    protected $table = 'kelas';
    public $timestamps = false;

    public function siswa()
    {
        return $this->hasMany(siswa::class, 'id_kelas', 'id_kelas');
    }
}
