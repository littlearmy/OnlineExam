<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;

    protected $table = 'soals';

    protected $fillable = ['id_mapel', 'nama_soal', 'jawaban_benar'];

    public function mapel()
    {
        return $this->belongsTo(MataPelajaran::class, 'id_mapel');
    }

    public function opsi()
    {
        return $this->hasMany(Opsi::class, 'id_soal')->inRandomOrder(); // jadi nilai opsi 1 - 5 bakal diacak
    }

    public function ujian()
    {
        return $this->hasMany(Ujian::class, 'id_soal');
    }
}
