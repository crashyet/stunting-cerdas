<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\RekomendasiMakanan;

class RekomendasiUserController extends Controller
{
    public function index()
{
    $foods = RekomendasiMakanan::where('status', 'publish')
        ->latest()
        ->get();

    return view('users.rekomendasi', compact('foods'));
}

public function detail($slug)
{
    $food = RekomendasiMakanan::where('slug', $slug)
        ->where('status', 'publish')
        ->firstOrFail();

    return view('users.rekomendasi-detail', compact('food'));
}

}
