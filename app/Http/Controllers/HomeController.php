<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\MataPelajaran;

class HomeController extends Controller
{
    public function index()
    {
        $siswa = Siswa::count();
        $guru = Guru::count();
        $kelas = Kelas::count();
        $mapel = MataPelajaran::count();

        return view('pages.home', compact('siswa', 'guru', 'kelas', 'mapel'));
    }
}
