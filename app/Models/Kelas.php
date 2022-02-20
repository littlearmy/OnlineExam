<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = ['nama_kelas', 'id_guru'];

    // satu kelas punya satu guru wali kelas
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }

    public function siswa()
    {
        return $this->hasOne(Siswa::class, 'id_kelas');
    }
}
