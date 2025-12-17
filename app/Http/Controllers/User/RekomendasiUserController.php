<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\RekomendasiMakanan;

class RekomendasiUserController extends Controller
{
    public function index()
    {
        $foods = RekomendasiMakanan::latest()->get();

        return view('users.rekomendasi', compact('foods'));
    }

    public function detail($slug)
    {
        $food = RekomendasiMakanan::where('slug', $slug)
            ->firstOrFail();

        return view('users.rekomendasi-detail', compact('food'));
    }
    
}
