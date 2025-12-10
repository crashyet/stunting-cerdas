<?php

namespace App\Http\Controllers;

use App\Models\Edukasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class EdukasiController extends Controller
{

public function kontenEdukasi()
{
    $artikels = Artikel::all(); // ambil semua artikel

    return view('admin.konten-edukasi', compact('artikels'));
}


    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'waktu_baca' => 'required',
            'penulis' => 'required',
            'intro' => 'required',
            'konten' => 'required',
            'thumbnail' => 'nullable|image',
        ]);

        // Upload thumbnail
        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnail', 'public');
        }

        Edukasi::create([
            'kategori' => $request->kategori,
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'penulis' => $request->penulis,
            'tanggal_publikasi' => now(),
            'waktu_baca' => $request->waktu_baca,
            'thumbnail' => $thumbnailPath,
            'intro' => $request->intro,
            'konten' => $request->konten,
        ]);

        return back()->with('success', 'Artikel berhasil ditambahkan!');
    }
}
