<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RekomendasiMakanan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class RekomendasiMakananController extends Controller
{
    public function index()
    {
        $data = RekomendasiMakanan::all();
        return view('admin.rekomendasi-makanan', compact('data'));
    }

    public function store(Request $request)
    {
        // VALIDASI
        $request->validate([
            'judul'      => 'required',
            'kategori'   => 'required',
            'gambar'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // ================================
        // 📌 Upload Gambar ke Storage
        // ================================
        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('rekomendasi', 'public');
        }

        // ================================
        // 📌 Generate Slug Unik
        // ================================
        $slug = Str::slug($request->judul);
        $originalSlug = $slug;
        $counter = 1;

        while (RekomendasiMakanan::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        // ================================
        // 📌 Simpan Ke Database
        // ================================
        RekomendasiMakanan::create([
            'judul'            => $request->judul,
            'kategori'         => $request->kategori,
            'usia'             => $request->usia,
            'porsi'            => $request->porsi,
            'kalori'           => $request->kalori,
            'protein'          => $request->protein,
            'karbo'            => $request->karbo,
            'lemak'            => $request->lemak,
            'vitamin'          => $request->vitamin,
            'porsi_disarankan' => $request->porsi_disarankan,
            'tips'             => $request->tips,
            'emoji'            => $request->emoji,
            'slug'             => $slug,
            'gambar'           => $gambarPath,
            'status'           => $request->status ?? 'draft',
        ]);

        return redirect()->route('admin.rekomendasi.index')
            ->with('success', 'Rekomendasi berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $item = RekomendasiMakanan::findOrFail($id);

        // Hapus file dari storage
        if ($item->gambar) {
            Storage::disk('public')->delete($item->gambar);
        }

        $item->delete();

        return redirect()->route('admin.rekomendasi.index')
            ->with('success', 'Rekomendasi berhasil dihapus!');
    }

    public function updateStatus(Request $request, $id)
    {
        $data = RekomendasiMakanan::findOrFail($id);

        // toggle draft/publish
        $data->status = $data->status === 'draft' ? 'publish' : 'draft';
        $data->save();

        return back()->with('success', 'Status berhasil diperbarui!');
    }
}
