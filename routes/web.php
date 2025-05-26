<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PertanyaanNilaiController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\PertanyaanKuisionerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PengajuanMagangController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [AuthenticatedSessionController::class, 'create']);

Route::get('/dashboard', function () {
    return view('app');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::post('/', [UserController::class, 'store'])->name('user.store');
        Route::put('/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    });

    Route::prefix('jurusan')->group(function () {
        Route::get('/', [JurusanController::class, 'index'])->name('jurusan.index');
        Route::post('/', [JurusanController::class, 'store'])->name('jurusan.store');
        Route::put('/{id}', [JurusanController::class, 'update'])->name('jurusan.update');
        Route::delete('/{id}', [JurusanController::class, 'destroy'])->name('jurusan.destroy');
    });

    Route::prefix('prodi')->group(function () {
        Route::get('/', [ProdiController::class, 'index'])->name('prodi.index');
        Route::post('/', [ProdiController::class, 'store'])->name('prodi.store');
        Route::put('/{id}', [ProdiController::class, 'update'])->name('prodi.update');
        Route::delete('/{id}', [ProdiController::class, 'destroy'])->name('prodi.destroy');
    });

    Route::prefix('dosen')->group(function () {
        Route::get('/', [DosenController::class, 'index'])->name('dosen.index');
        Route::get('/create', [DosenController::class, 'create'])->name('dosen.create');
        Route::post('/', [DosenController::class, 'store'])->name('dosen.store');
        Route::get('/{id}', [DosenController::class, 'edit'])->name('dosen.edit');
        Route::put('/{id}', [DosenController::class, 'update'])->name('dosen.update');
        Route::delete('/{id}', [DosenController::class, 'destroy'])->name('dosen.destroy');
    });

    Route::prefix('mahasiswa')->group(function () {
        Route::get('/', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
        Route::get('/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
        Route::post('/', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
        Route::get('/{id}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
        Route::put('/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
        Route::delete('/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
    });

    Route::prefix('perusahaan')->group(function () {
        Route::get('/', [PerusahaanController::class, 'index'])->name('perusahaan.index');
        Route::post('/', [PerusahaanController::class, 'store'])->name('perusahaan.store');
        Route::put('/{id}', [PerusahaanController::class, 'update'])->name('perusahaan.update');
        Route::delete('/{id}', [PerusahaanController::class, 'destroy'])->name('perusahaan.destroy');
    });

    Route::prefix('pertanyaanKuisioner')->group(function () {
        Route::get('/', [PertanyaanKuisionerController::class, 'index'])->name('pertanyaanKuisioner.index');
        Route::post('/', [PertanyaanKuisionerController::class, 'store'])->name('pertanyaanKuisioner.store');
        Route::put('/{id}', [PertanyaanKuisionerController::class, 'update'])->name('pertanyaanKuisioner.update');
        Route::delete('/{id}', [PertanyaanKuisionerController::class, 'destroy'])->name('pertanyaanKuisioner.destroy');
    });

    Route::prefix('pertanyaanNilai')->group(function () {
        Route::get('/', [PertanyaanNilaiController::class, 'index'])->name('pertanyaanNilai.index');
        Route::post('/', [PertanyaanNilaiController::class, 'store'])->name('pertanyaanNilai.store');
        Route::put('/{id}', [PertanyaanNilaiController::class, 'update'])->name('pertanyaanNilai.update');
        Route::delete('/{id}', [PertanyaanNilaiController::class, 'destroy'])->name('pertanyaanNilai.destroy');
    });

    Route::prefix('pengajuanMagang')->group(function () {
        Route::get('/', [PengajuanMagangController::class, 'index'])->name('pengajuanMagang.index');
        Route::get('/create', [PengajuanMagangController::class, 'create'])->name('pengajuanMagang.create');
        Route::post('/', [PengajuanMagangController::class, 'store'])->name('pengajuanMagang.store');
        Route::put('/{id}/status', [PengajuanMagangController::class, 'updateStatus'])->name('pengajuanMagang.updateStatus');
    });
});

require __DIR__.'/auth.php';
