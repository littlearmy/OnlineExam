<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegistrasiController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\NilaiController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
// Route::post('logout', [App\Http\Controllers\API\AuthController::class, 'logout']);

Route::group(['middleware' => ['auth', 'ceklevel:admin,kepsek,guru,siswa']], function() {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');

    Route::resource('siswa', SiswaController::class);
    Route::resource('guru', GuruController::class);
    Route::resource('petugas', PetugasController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('jadwal', JadwalController::class);
    Route::resource('matapelajaran', MatapelajaranController::class);
    Route::resource('soal', SoalController::class);

    Route::get('/ujian', [UjianController::class, 'pilihMapel']);
    Route::get('/ujian/{id}', [UjianController::class, 'mulaiUjian'])->name('mulaiUjian');
    Route::post('/kirim-jawaban', [UjianController::class, 'kirimJawaban']);

    Route::get('/daftar-nilai', [UjianController::class, 'daftarNilai'])->name('daftarNilai');

    Route::get('/nilai-siswa', [NilaiController::class, 'index'])->name('nilai-siswa');
    Route::get('/nilai-siswa/{id}', [NilaiController::class, 'nilai'])->name('daftar-nilai-siswa');
    Route::post('logout', [AuthController::class, 'logout']);
});