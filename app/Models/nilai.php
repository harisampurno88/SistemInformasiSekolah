<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
     protected $fillable = [
        'id_nilai',
        'id_siswa',
        'id_mata_pelajaran',
        'id_tahun_ajaran',
        'nilai_tugas',
        'nilai_uts',
        'nilai_uas',
        'kehadiran',
        'catatan_guru'
    ];
    protected $table = 'nilai';
    public $timestamps = false;
}
