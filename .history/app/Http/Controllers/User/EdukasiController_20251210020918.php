<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Edukasi;
use Illuminate\Http\Request;

class EdukasiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $filter = $request->filter ?? 'Semua';

        $query = Edukasi::where('status', 'publish');

        if ($search) {
            $query->where('judul', 'like', '%' . $search . '%');
        }

        if ($filter !== 'Semua') {
            $query->where('kategori', $filter);
        }

        $articles = $query->latest()->get();

        return view('users.edukasi', [
            'articles' => $articles,
            'search' => $search,
            'selectedFilter' => $filter
        ]);
    }

    public function detail($slug)
    {
        $artikel = Edukasi::where('slug', $slug)
            ->where('status', 'publish')
            ->firstOrFail();

        return view('users.edukasi', compact('artikel'));
    }
}
