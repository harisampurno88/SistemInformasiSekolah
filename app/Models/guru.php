<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
        protected $fillable = [
        'nip',
        'nama',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'no_telepon',
        'id_mata_pelajaran',
        'id_jabatan',
    ];
    protected $table = 'guru';
    public $timestamps = false;

    public function matapelajaran()
    {
        return $this->belongsTo(matapelajaran::class, 'id_mata_pelajaran', 'id_mata_pelajaran');
    }

    public function jabatan()
    {
        return $this->belongsTo(jabatan::class, 'id_jabatan', 'id_jabatan');
    }

    public function jadwal()
    {
        return $this->hasMany(jadwal::class, 'nip', 'nip');
    }
}
