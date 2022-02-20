<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class RegistrasiController extends Controller
{
    public function regisSiswa()
    {
        return view('auth.regis-siswa');
    }

    public function regisGuru()
    {
        return view('auth.regis-guru');
    }

    public function enrollSiswa(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'level' => 'siswa',
            'password' => $request->password
        ]);

        $input = $request->except(['name', 'email', 'password', 'konfirmasi_password']);

        Guru::create(array_merge($input, ['id_user' => $user->id]));

        Alert::success('Berhasil', 'Registrasi berhasil. Silahkan Login');

        return redirect('/login');
    }

    public function enrollGuru(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'level' => 'guru',
            'password' => $request->password
        ]);

        $input = $request->except(['name', 'email', 'password', 'konfirmasi_password']);

        Guru::create(array_merge($input, ['id_user' => $user->id]));

        Alert::success('Berhasil', 'Registrasi berhasil. Silahkan Login');

        return redirect('/login');
    }
}
