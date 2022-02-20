<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opsi extends Model
{
    use HasFactory;

    protected $table = 'opsis';

    protected $fillable = ['id_soal', 'nama_opsi'];

    public function soal()
    {
        return $this->belongsTo(Soal::class, 'id_soal');
    }
}
