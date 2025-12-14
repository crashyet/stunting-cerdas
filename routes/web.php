<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


use App\Http\Controllers\Admin\EdukasiController as AdminEdukasiController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RekomendasiMakananController;
use App\Http\Controllers\User\RekomendasiUserController;

use App\Http\Controllers\User\EdukasiController as UserEdukasiController;
use App\Http\Controllers\RekomendasiController;


Route::get('/', function () {
    return view('landingpage');
})->name('landing');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

/*
|--------------------------------------------------------------------------
| USER Routes (role:user)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:user'])->group(function () {

    // HALAMAN UTAMA → EDUKASI
    Route::get('/edukasi', [UserEdukasiController::class, 'index'])
        ->name('user.edukasi');

    Route::get('/edukasi/{slug}', [UserEdukasiController::class, 'detail'])
        ->name('user.edukasi.detail');

    // CEK STUNTING
    Route::get('/cek-stunting', function () {
        return view('users.cek-stunting');
    })->name('user.cekstunting');

    Route::post('/hitung-zscore', [App\Http\Controllers\ZScoreController::class, 'hitung'])
        ->name('user.hitung-zscore');

    // REKOMENDASI MAKANAN (Controller Baru)
    Route::get('/rekomendasi', [RekomendasiController::class, 'index'])
        ->name('user.rekomendasi');

    // DETEKSI MAKANAN 
    Route::get('/deteksi-makanan', function () {return view('users.deteksi-makanan');
        })->middleware(['auth', 'role:user'])
        ->name('user.deteksi.makanan');
Route::get('/rekomendasi', [RekomendasiUserController::class, 'index'])
    ->name('user.rekomendasi');

Route::get('/rekomendasi/{slug}', [RekomendasiUserController::class, 'detail'])
    ->name('user.rekomendasi.detail');


    // DATA ANAK
    Route::get('/data-anak', function () {
        return view('users.data-anak');
    })->name('user.dataanak');

    // DASHBOARD USER
    Route::get('/dashboard', function () {
        return view('users.dashboard');
    })->name('user.dashboard');
});

/*
|--------------------------------------------------------------------------
| ADMIN Routes (role:admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->group(function () {

    // DASHBOARD
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // ARTIKEL EDUKASI
    Route::get('/admin/konten-edukasi', [AdminEdukasiController::class, 'kontenEdukasi'])
        ->name('admin.konten-edukasi');

    Route::post('/edukasi/store', [AdminEdukasiController::class, 'store'])
        ->name('admin.edukasi.store');

    Route::delete('/admin/edukasi/{id}', [AdminEdukasiController::class, 'destroy'])
        ->name('edukasi.destroy');

    Route::patch('/admin/edukasi/{id}/status', [AdminEdukasiController::class, 'updateStatus'])
        ->name('edukasi.updateStatus');

    // HALAMAN TANPA CONTROLLER
    Route::get('/admin/rekomendasi-makanan', function () {
        return view('admin.rekomendasi-makanan');
    });

    Route::get('/admin/cek-stunting', function () {
        return view('admin.cek-stunting');
    });

    Route::get('/admin/cek-gizi', function () {
        return view('admin.cek-gizi');
    });

    // MANAGEMENT USER
    Route::get('/admin/manajemen-user', [UserController::class, 'index'])
        ->name('admin.users.index');

    Route::delete('/admin/manajemen-user/{user}', [UserController::class, 'destroy'])
        ->name('admin.users.destroy');

    // REKOMENDASI MAKANAN
    Route::get('/admin/rekomendasi-makanan', [RekomendasiMakananController::class,'index'])
        ->name('admin.rekomendasi.index');

    Route::get('/admin/rekomendasi-makanan/create', [RekomendasiMakananController::class,'create'])
        ->name('admin.rekomendasi.create');

    Route::post('/admin/rekomendasi-makanan/store', [RekomendasiMakananController::class,'store'])
        ->name('admin.rekomendasi.store');
    Route::delete('/admin/rekomendasi-makanan/{id}', [RekomendasiMakananController::class, 'destroy'])
    ->name('admin.rekomendasi.destroy');

    Route::post('/rekomendasi-makanan/{id}/status', [RekomendasiMakananController::class, 'updateStatus'])
        ->name('admin.rekomendasi.updateStatus');

});

Route::get('/analyze', [AnalyzeController::class, 'index'])->name('analyze.index');
Route::post('/analyze', [AnalyzeController::class, 'submit'])->name('analyze.submit');

