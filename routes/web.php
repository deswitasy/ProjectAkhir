<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PDFController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::post('/logout', [LoginController::class, 'logout']);

//petugas
Route::get('/petugas', [PetugasController::class, 'index'])->middleware('admin');
Route::get('/petugas/create', [PetugasController::class, 'create']);
Route::post('/petugas', [PetugasController::class, 'store']);
Route::get('/petugas/{petugas}', [PetugasController::class, 'edit']);
Route::post('/petugas/update', [PetugasController::class, 'update']);
Route::post('/petugas/{id}/delete', [PetugasController::class, 'destroy']);

//kelas
Route::get('/kelas', [KelasController::class, 'index'])->middleware('admin');
Route::get('/kelas/create', [KelasController::class, 'create']);
Route::post('/kelas', [KelasController::class, 'store']);
Route::get('/kelas/{kelas}/edit', [KelasController::class, 'edit']);
Route::put('/kelas/{kelas}', [KelasController::class, 'update']);
Route::delete('/kelas/{kelas}', [KelasController::class, 'destroy']);

//spp
Route::get('/spp', [SppController::class, 'index'])->middleware('admin');
Route::get('/spp/create', [SppController::class, 'create']);
Route::post('/spp', [SppController::class, 'store']);
Route::get('/spp/{spp}/edit', [SppController::class, 'edit']);
Route::put('/spp/{spp}', [SppController::class, 'update']);
Route::delete('/spp/{spp}', [SppController::class, 'destroy']);

//siswa
Route::get('/siswa', [SiswaController::class, 'index'])->middleware('admin');
Route::get('/siswa/create', [SiswaController::class, 'create']);
Route::post('/siswa', [SiswaController::class, 'store']);
Route::get('/siswa/{siswa}/edit', [SiswaController::class, 'edit']);
Route::put('/siswa/{siswa}', [SiswaController::class, 'update']);
Route::delete('/siswa/{siswa}', [SiswaController::class, 'destroy']);
Route::post('/siswa/getsiswa', [SiswaController::class, 'getSiswa'])->middleware('auth');

//profile
Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');

//transaksi pembayaran
Route::get('/pembayaran', [PembayaranController::class, 'index'])->middleware('auth');
Route::get('/pembayaran/{siswa}', [PembayaranController::class, 'show'])->middleware('auth');
Route::post('/pembayaran/getbulan', [PembayaranController::class, 'getBulan'])->middleware('auth');
Route::post('/pembayaran', [PembayaranController::class, 'store'])->middleware('auth');
Route::delete('/pembayaran/{pembayaran}', [PembayaranController::class, 'destroy']);
Route::post('/laporan/cetakexcel', [PembayaranController::class, 'cetak'])->middleware('auth');
Route::get('/pembayaran/{pembayaran}/print', [PDFController::class, 'print'])->middleware('auth');


Route::match(['get', 'post'], '/laporan', [PembayaranController::class, 'laporan'])->middleware('auth');
Route::post('/laporan/cetakpdf', [PDFController::class, 'generatePDF'])->middleware('auth');
