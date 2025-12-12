<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RekomendasiMakanan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RekomendasiMakananController extends Controller
{
    public function index()
    {
        $data = RekomendasiMakanan::all();
        return view('admin.rekomendasi-makanan', compact('data'));
    }

    public function create()
    {
        return view('admin.rekomendasi-makanan');
    }

    public function store(Request $request)
{
    dd($request->all(), $request->file('gambar'));
}



}
