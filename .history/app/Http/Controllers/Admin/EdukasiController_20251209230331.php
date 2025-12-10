<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Edukasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EdukasiController extends Controller
{

    public function kontenEdukasi()
    {
        $edukasis = Edukasi::all();

        return view('admin.konten-edukasi', compact('edukasis'));
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

        // ================================
        // GENERATE SLUG UNIK OTOMATIS
        // ================================
        $slug = Str::slug($request->judul);

        $count = Edukasi::where('slug', $slug)->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }
        // ================================


        Edukasi::create([
            'kategori' => $request->kategori,
            'judul' => $request->judul,
            'slug' => $slug,
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

