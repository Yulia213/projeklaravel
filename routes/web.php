<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AuthController;

Route::middleware(['auth'])->group(function(){
// menampilkan data barang
Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
Route::get('/barang/search', [BarangController::class, 'search'])->name('barang.search'); 

// Menampilkan daftar siswa + search
Route::get('siswa', [SiswaController::class, 'index'])->name('siswa.index');
Route::get('siswa/search', [SiswaController::class, 'search'])->name('siswa.search');

// menampilkan data pinjaman
Route::get('/pinjaman', [PinjamanController::class, 'index']);
Route::get('/pinjaman/search', [PinjamanController::class, 'search'])->name('pinjaman.search');

// menampilkan beranda
Route::get('/index', [IndexController::class, 'index'])->name('index');

// tambah data peminjaman
Route::get('/tambahbarang', [BarangController::class, 'create']);
Route::post('/tambahbarang', [BarangController::class, 'store']);

// tambah data siswa
Route::get('/tambahsiswa', [SiswaController::class, 'create']);
Route::post('/tambahsiswa', [SiswaController::class, 'store']);

// tambah pinjaman
Route::get('/tambahpinjaman', [PinjamanController::class, 'create']);
Route::post('/tambahpinjaman', [PinjamanController::class, 'store']);

// menghapus data barang
Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');

// menghapus data siswa
Route::delete('/siswa/{nisn}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

// pembaruan data barang
Route::get('/barang/{id_barang}/edit', [BarangController::class, 'edit'])->name('barang.edit');
Route::put('/barang/{id_barang}', [BarangController::class, 'update'])->name('barang.update');

// pembaruan data siswa
Route::get('/siswa/edit/{nisn}', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::put('/siswa/{nisn}', [SiswaController::class, 'update'])->name('siswa.update');

// pembaruan data peminjaman
Route::get('/pinjaman/edit/{id_pinjam}', [PinjamanController::class, 'edit'])->name('pinjaman.edit');
Route::put('/pinjaman/{id_pinjam}', [PinjamanController::class, 'update'])->name('pinjaman.update');
Route::get('/pinjaman', [PinjamanController::class, 'index'])->name('pinjaman.index');
});
// login
Route::middleware(['web'])->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
