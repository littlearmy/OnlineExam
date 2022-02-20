<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;

    protected $table = 'mata_pelajarans';

    protected $fillable = ['nama_mapel', 'kelas', 'status'];

    public function jadwal()
    {
        return $this->hasOne(Jadwal::class, 'id_mapel');
    }

    public function soal() 
    {
        return $this->hasMany(Soal::class, 'id_mapel');
    }

    public function hasil()
    {
        return $this->hasMany(Hasil::class, 'id_mapel');
    }
}
