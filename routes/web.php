<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::get('/data-asisten', [App\Http\Controllers\DataAsistenController::class, 'index'])->name('dataasiten');
Route::post('/tambah-asisten', [App\Http\Controllers\DataAsistenController::class, 'store'])->name('storeAsisten');
Route::get('/edit-asisten/{id}', [App\Http\Controllers\DataAsistenController::class, 'edit'])->name('editAsisten');
Route::put('/update-asisten/{id}', [App\Http\Controllers\DataAsistenController::class, 'update'])->name('updateAsisten');
Route::get('/hapus-asisten/{id}', [App\Http\Controllers\DataAsistenController::class, 'destroy'])->name('destroyAsisten');

Route::get('/data-kelas', [App\Http\Controllers\DataKelasController::class, 'index'])->name('datakelas');
Route::post('/tambah-kelas', [App\Http\Controllers\DataKelasController::class, 'store'])->name('storeKelas');
Route::get('/hapus-kelas/{id}', [App\Http\Controllers\DataKelasController::class, 'destroy'])->name('destroyKelas');
Route::put('/update-kelas/{id}', [App\Http\Controllers\DataKelasController::class, 'update'])->name('updateKelas');

Route::get('/data-materi', [App\Http\Controllers\DataMateriController::class, 'index'])->name('datamateri');
Route::post('/tambah-materi', [App\Http\Controllers\DataMateriController::class, 'store'])->name('storeMateri');
Route::get('/hapus-materi/{id}', [App\Http\Controllers\DataMateriController::class, 'destroy'])->name('destroyMateri');
Route::put('/update-materi/{id}', [App\Http\Controllers\DataMateriController::class, 'update'])->name('updateMateri');

Route::get('/code-generator', [App\Http\Controllers\CodeGeneratorController::class, 'index'])->name('codegenerator');
Route::post('/generate-code', [App\Http\Controllers\CodeGeneratorController::class, 'store'])->name('generatecode');

Route::post('/simpan-absen', [App\Http\Controllers\AbsenController::class, 'store'])->name('storeAbsen');
Route::post('/update-absen', [App\Http\Controllers\AbsenController::class, 'update'])->name('updateAbsen');
Route::get('/export-absensi', [App\Http\Controllers\AbsenController::class, 'export'])->name('exportAbsen');
Route::post('/search-riwayat', [App\Http\Controllers\ReportAbsenController::class, 'search'])->name('searchRiwayat');

Route::get('/report-absen', [App\Http\Controllers\ReportAbsenController::class, 'index'])->name('reportabsen');
Route::get('/riwayat-absen', [App\Http\Controllers\RiwayatAbsenController::class, 'index'])->name('riwayatabsen');
