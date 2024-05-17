<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PeralatanController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

// Route untuk menampilkan daftar mahasiswa
Route::get('mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');

// Route untuk menampilkan form tambah mahasiswa
Route::get('mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');

// Route untuk menyimpan data mahasiswa
Route::post('mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');

// Route untuk menampilkan form edit mahasiswa
Route::get('mahasiswa/{nim}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');

// Route untuk mengupdate data mahasiswa
Route::put('mahasiswa/{nim}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');

// Route untuk menghapus data mahasiswa
Route::delete('mahasiswa/{nim}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');

Route::get('mahasiswa/recap', [MahasiswaController::class, 'recap'])->name('mahasiswa.recap');


Route::get('peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
Route::get('peminjaman/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
Route::post('peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');
Route::get('peminjaman/{id}/edit', [PeminjamanController::class, 'edit'])->name('peminjaman.edit');
Route::put('peminjaman/{id}', [PeminjamanController::class, 'update'])->name('peminjaman.update');
Route::delete('peminjaman/{id}', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');

Route::get('peralatan', [PeralatanController::class, 'index'])->name('peralatan.index');
Route::get('peralatan/create', [PeralatanController::class, 'create'])->name('peralatan.create');
Route::post('peralatan', [PeralatanController::class, 'store'])->name('peralatan.store');
Route::get('peralatan/{id}/edit', [PeralatanController::class, 'edit'])->name('peralatan.edit');
Route::put('peralatan/{id}', [PeralatanController::class, 'update'])->name('peralatan.update');
Route::delete('peralatan/{id}', [PeralatanController::class, 'destroy'])->name('peralatan.destroy');

Route::resource('profile', UserProfileController::class);