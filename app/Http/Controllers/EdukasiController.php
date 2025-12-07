<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EdukasiController extends Controller
{
    public function index(Request $request)
    {
        // DATA ASLI dari tampilan lama (tidak dihapus)
        $articles = [
            [
                'kategori' => 'Panduan',
                'judul' => 'Peran ASI Eksklusif dalam Mencegah Stunting',
                'deskripsi' => 'ASI eksklusif adalah fondasi penting kesehatan bayi.',
                'waktu' => '6 menit baca',
                'gambar' => '/article1.png'
            ],
            [
                'kategori' => 'Edukasi',
                'judul' => 'Tanda-Tanda Anak Mengalami Stunting',
                'deskripsi' => 'Kenali tanda-tanda stunting agar bisa intervensi lebih dini.',
                'waktu' => '5 menit baca',
                'gambar' => '/article1.png'
            ],
            [
                'kategori' => 'Kesehatan',
                'judul' => 'Sanitasi & Kebersihan: Faktor Penting Pencegahan Stunting',
                'deskripsi' => 'Lingkungan bersih sangat berpengaruh pada kesehatan anak.',
                'waktu' => '4 menit baca',
                'gambar' => '/article1.png'
            ],
            [
                'kategori' => 'Nutrisi',
                'judul' => 'Peran ASI Eksklusif dalam Mencegah Stunting',
                'deskripsi' => 'ASI eksklusif adalah fondasi penting kesehatan bayi.',
                'waktu' => '6 menit baca',
                'gambar' => '/article1.png'
            ],
            [
                'kategori' => 'Kesehatan',
                'judul' => 'Sanitasi & Kebersihan: Faktor Penting Pencegahan Stunting',
                'deskripsi' => 'Lingkungan bersih sangat berpengaruh pada kesehatan anak.',
                'waktu' => '4 menit baca',
                'gambar' => '/article1.png'
            ],
            [
                'kategori' => 'Edukasi',
                'judul' => 'Tanda-Tanda Anak Mengalami Stunting',
                'deskripsi' => 'Kenali tanda-tanda stunting agar bisa intervensi lebih dini.',
                'waktu' => '5 menit baca',
                'gambar' => '/article1.png'
            ],
        ];

        // FILTER SEARCH
        if ($request->search) {
            $keyword = strtolower($request->search);
            $articles = array_filter($articles, function ($a) use ($keyword) {
                return str_contains(strtolower($a['judul']), $keyword) ||
                       str_contains(strtolower($a['deskripsi']), $keyword);
            });
        }

        // FILTER CATEGORY
        if ($request->filter && $request->filter !== 'Semua') {
            $filter = $request->filter;
            $articles = array_filter($articles, function ($a) use ($filter) {
                return $a['kategori'] === $filter;
            });
        }

        return view('users.edukasi', [
            'articles'       => $articles,
            'selectedFilter' => $request->filter ?? 'Semua',
            'search'         => $request->search ?? ''
        ]);
    }
}
