<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EdukasiController;
use App\Http\Controllers\RekomendasiController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| Landing Page
|--------------------------------------------------------------------------
*/
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

    // HALAMAN UTAMA SETELAH LOGIN → EDUKASI
    Route::get('/edukasi', [EdukasiController::class, 'index'])->name('user.edukasi');

    // CEK STUNTING
    Route::get('/cek-stunting', function () {
        return view('users.cek-stunting');
    })->name('user.cekstunting');

    // REKOMENDASI MAKANAN (Controller Baru)
    Route::get('/rekomendasi', [RekomendasiController::class, 'index'])
        ->name('user.rekomendasi');

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

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/konten-edukasi', function () {
    return view('admin.konten-edukasi');
    });

    Route::get('/admin/rekomendasi-makanan', function () {
    return view('admin.rekomendasi-makanan');
    });

    Route::get('/admin/cek-stunting', function () {
    return view('admin.cek-stunting');
    });

    Route::get('/admin/cek-gizi', function () {
    return view('admin.cek-gizi');
    });

    Route::get('/admin/manajemen-user', function () {
    $users = \App\Models\User::all();
    return view('admin.manajemen-user', compact('users'));
});
Route::delete('/admin/manajemen-user/{id}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])
    ->name('admin.user.destroy');
});
