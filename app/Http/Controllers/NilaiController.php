<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\MataPelajaran;
use App\Models\Hasil;

class NilaiController extends Controller
{
    public function index()
    {
        $mapel = MataPelajaran::all();

        return view('pages.hasil.index', compact('mapel'));
    }

    public function nilai($id)
    {
        $hasil = Hasil::with('siswa.user')->where('id_mapel', $id)->get();
        // dd($hasil);
        // exit();
        return view('pages.hasil.nilai', compact('hasil'));
    }
}
