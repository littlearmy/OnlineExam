<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    use HasFactory;

    protected $table = 'ujians';

    public function mapel()
    {
        return $this->belongsTo(MataPelajaran::class, 'id_matkul');
    }

    public function soal()
    {
        return $this->belongsTo(Soal::class, 'id_soal');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_mahasiswa');
    }
}
