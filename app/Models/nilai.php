<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
     protected $fillable = [
        'id_nilai',
        'nisn',
        'id_mata_pelajaran',
        'id_tahun_ajaran',
        'nilai_tugas',
        'nilai_uts',
        'nilai_uas'
    ];
    protected $table = 'nilai';
    public $timestamps = false;

    public function siswa()
    {
        return $this->belongsTo(siswa::class, 'nisn', 'nisn');
    }

    public function matapelajaran()
    {
        return $this->belongsTo(matapelajaran::class, 'id_mata_pelajaran', 'id_mata_pelajaran');
    }

    public function tahunajaran()
    {
        return $this->belongsTo(tahunajaran::class, 'id_tahun_ajaran', 'id_tahun_ajaran');
    }
}
