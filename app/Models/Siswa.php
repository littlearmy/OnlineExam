<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    
    protected $table = 'siswas';

    protected $fillable = ['id_user', 'nis', 'id_kelas', 'alamat', 'no_hp'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function hasil()
    {
        return $this->hasMany(Hasil::class, 'id_siswa');
    }
}
