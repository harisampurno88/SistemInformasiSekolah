<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $fillable = [
        'nisn',
        'nama',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'no_telepon',
        'id_kelas',
        'id_tahun_ajaran'
    ];
    protected $table = 'siswa';
    public $timestamps = false;

    public function kelas()
    {
        return $this->belongsTo(kelas::class, 'id_kelas', 'id_kelas');
    }

    public function tahunajaran()
    {
        return $this->belongsTo(tahunajaran::class, 'id_tahun_ajaran', 'id_tahun_ajaran');
    }

    public function nilai()
    {
        return $this->hasMany(nilai::class, 'nisn', 'nisn');
    }


}
