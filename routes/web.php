<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnalyzeController;

Route::get('/asdas', function () {
    return view('welcome');
});

Route::get('/analyze', [AnalyzeController::class, 'index'])->name('analyze.index');
Route::post('/analyze', [AnalyzeController::class, 'submit'])->name('analyze.submit');

