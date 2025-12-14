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
        // VALIDASI
        $validated = $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', 
        ]);

        // UPLOAD GAMBAR
        $filename = null;
        if ($request->hasFile('gambar')) {
            $filename = time() . '-' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('uploads/rekomendasi'), $filename);
        }

        // SIMPAN KE DB
        RekomendasiMakanan::create([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'usia' => $request->usia,
            'porsi' => $request->porsi,
            'kalori' => $request->kalori,
            'protein' => $request->protein,
            'karbo' => $request->karbo,
            'lemak' => $request->lemak,
            'vitamin' => $request->vitamin,
            'porsi_disarankan' => $request->porsi_disarankan,
            'tips' => $request->tips,
            'emoji' => $request->emoji,
            'slug' => Str::slug($request->judul),
            'gambar' => $filename,
            'status' => $request->status ?? 'draft', // ← tambahkan ini

        ]);

        return redirect()->route('admin.rekomendasi.index')
            ->with('success', 'Berhasil ditambahkan!');
    }

    public function destroy($id)
{
    $item = RekomendasiMakanan::findOrFail($id);

    // Hapus file gambar jika ada
    if ($item->gambar && file_exists(public_path('uploads/rekomendasi/' . $item->gambar))) {
        unlink(public_path('uploads/rekomendasi/' . $item->gambar));
    }

    // Hapus data dari database
    $item->delete();

    return redirect()->route('admin.rekomendasi.index')
        ->with('success', 'Data berhasil dihapus!');
}


public function updateStatus(Request $request, $id)
{
    $data = RekomendasiMakanan::findOrFail($id);

    $data->status = $data->status == 'draft' ? 'publish' : 'draft';
    $data->save();

    return back()->with('success', 'Status berhasil diperbarui!');
}



}
