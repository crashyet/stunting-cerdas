<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Edukasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EdukasiController extends Controller
{
    /* ================= ADMIN: LIST ================= */
    public function kontenEdukasi()
    {
        $edukasis = Edukasi::all();
        return view('admin.konten-edukasi', compact('edukasis'));
    }

    /* ================= ADMIN: UPDATE STATUS ================= */
    public function updateStatus($id, Request $request)
    {
        $edukasi = Edukasi::findOrFail($id);

        $edukasi->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Status artikel berhasil diperbarui!');
    }

    /* ================= ADMIN: STORE ================= */
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

        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnail', 'public');
        }

        // Generate slug unik
        $slug = Str::slug($request->judul);
        $originalSlug = $slug;
        $counter = 1;

        while (Edukasi::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

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
            'status' => 'draft',
        ]);

        return back()->with('success', 'Artikel berhasil ditambahkan!');
    }

    /* ================= ADMIN: DELETE ================= */
    public function destroy($id)
    {
        $edukasi = Edukasi::findOrFail($id);
        $edukasi->delete();

        return redirect()->back()->with('success', 'Data edukasi berhasil dihapus!');
    }
}
