<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    protected $fillable = [
        'id_jadwal',
        'id_kelas',
        'nip',
        'id_mata_pelajaran',
        'hari',
        'jam_mulai',
        'jam_selesai'
    ];
    protected $table = 'jadwal';
    public $timestamps = false;

    public function kelas()
    {
        return $this->belongsTo(kelas::class, 'id_kelas', 'id_kelas');
    }

    public function guru()
    {
        return $this->belongsTo(guru::class, 'nip', 'nip');
    }

    public function matapelajaran()
    {
        return $this->belongsTo(matapelajaran::class, 'id_mata_pelajaran', 'id_mata_pelajaran');
    }
}
