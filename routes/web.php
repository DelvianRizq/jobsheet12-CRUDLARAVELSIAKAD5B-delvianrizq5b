<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KrsController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\PenggunaController;
use Illuminate\Support\Facades\Route;

// Halaman untuk tamu: hanya bisa dibuka bila BELUM login
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.attempt');
});

// Halaman internal: hanya bisa dibuka bila SUDAH login + mencegah back history
Route::middleware(['auth', 'prevent-back-history'])->group(function () {

    // Halaman awal diarahkan ke dashboard
    Route::get('/', fn () => redirect()->route('dashboard'));
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Hanya admin; middleware role berjalan SETELAH auth
    Route::get('/pengguna', [PenggunaController::class, 'index'])
        ->middleware('role:admin')
        ->name('pengguna.index');

    // Dari Jobsheet 07: menampilkan versi PHP/MySQL dan nama database (dilindungi)
    Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');

    // Data Dosen (Jobsheet 11)
    // 1) Endpoint JSON DataTables: HARUS di atas route yang memuat {dosen}
    Route::get('/dosen/data', [DosenController::class, 'data'])->name('dosen.data');

    // 2) Tambah, ubah, hapus: khusus admin (role berjalan SETELAH auth)
    Route::middleware('role:admin')->group(function () {
    Route::resource('dosen', DosenController::class)->except(['index', 'show']);
    });

    // 3) Daftar dan detail: semua pengguna yang sudah login
    Route::resource('dosen', DosenController::class)->only(['index', 'show']);

    // Data Mahasiswa (Jobsheet 12)
    // 1) Endpoint JSON DataTables: HARUS di atas route yang memuat {mahasiswa}
    Route::get('/mahasiswa/data', [MahasiswaController::class, 'data'])->name('mahasiswa.data');

    // 2) Tambah, ubah, hapus: khusus admin (role berjalan SETELAH auth)
    Route::middleware('role:admin')->group(function () {
        Route::resource('mahasiswa', MahasiswaController::class)->except(['index', 'show']);
        // FITUR TAMBAHAN 2: Rute untuk memulihkan data mahasiswa yang di-soft delete
        Route::post('/mahasiswa/{id}/restore', [MahasiswaController::class, 'restore'])->name('mahasiswa.restore');
    });

    // 3) Daftar dan detail: semua pengguna yang sudah login
    Route::resource('mahasiswa', MahasiswaController::class)->only(['index', 'show']);

    // Data Mata Kuliah (Sesuai JS 11)
    // 1) Endpoint JSON DataTables: HARUS di atas route yang memuat {matakuliah}
    Route::get('/matakuliah/data', [MatakuliahController::class, 'data'])->name('matakuliah.data');

    // 2) Tambah, ubah, hapus: khusus admin (role berjalan SETELAH auth)
    Route::middleware('role:admin')->group(function () {
        Route::resource('matakuliah', MatakuliahController::class)->except(['index', 'show']);
    });

    // 3) Daftar dan detail: semua pengguna yang sudah login
    Route::resource('matakuliah', MatakuliahController::class)->only(['index', 'show']);

    // Data Kartu Rencana Studi (KRS)
    // 1) Endpoint JSON DataTables: HARUS di atas route yang memuat {krs}
    Route::get('/krs/data', [KrsController::class, 'data'])->name('krs.data');

    // 2) Tambah, ubah, hapus: khusus admin
    Route::middleware('role:admin')->group(function () {
        Route::resource('krs', KrsController::class)->except(['index', 'show'])->parameters(['krs' => 'krs']);
    });

    // 3) Daftar dan detail: semua pengguna yang sudah login
    Route::resource('krs', KrsController::class)->only(['index', 'show'])->parameters(['krs' => 'krs']);
});