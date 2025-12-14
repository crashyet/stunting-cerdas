<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnakController extends Controller
{
    // halaman DATA ANAK
    public function index()
    {
        $anak = Anak::where('user_id', Auth::id())->get();

        return view('users.data-anak', compact('anak'));
    }

    // simpan anak
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'umur' => 'required|numeric',
            'jenis_kelamin' => 'required',
        ]);

        Anak::create([
            'user_id' => Auth::id(),
            'nama' => $request->nama,
            'umur' => $request->umur,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        return back()->with('success', 'Data anak berhasil ditambahkan');
    }
}
