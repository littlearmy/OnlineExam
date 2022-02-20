<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;

    protected $table = 'hasils';

    protected $fillable = ['id_siswa', 'id_mapel', 'nilai_final'];

    public function mapel() 
    {
        return $this->belongsTo(MataPelajaran::class, 'id_mapel');
    }

    public function siswa() 
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }
}
