<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'gurus';

    protected $fillable = ['id_user', 'nig', 'alamat', 'no_hp'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // satu kelas punya satu guru wali kelas
    public function kelas()
    {
        return $this->hasOne(Kelas::class, 'id_guru');
    }
}
