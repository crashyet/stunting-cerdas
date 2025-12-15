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
        $anak = Anak::where('user_id', Auth::id())
            ->with(['pengukuran' => function($query) {
                $query->latest();
            }])
            ->get();

        return view('users.data-anak', compact('anak'));
    }

    // simpan anak
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'umur' => 'required|numeric',
            'jenis_kelamin' => 'required',
            'tinggi_badan' => 'nullable|numeric',
            'berat_badan' => 'nullable|numeric',
        ]);

        // Create anak record
        $anak = Anak::create([
            'user_id' => Auth::id(),
            'nama' => $request->nama,
            'umur' => $request->umur,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        // Create pengukuran record if tinggi and berat provided
        if ($request->tinggi_badan && $request->berat_badan) {
            $anak->pengukuran()->create([
                'tinggi_badan' => $request->tinggi_badan,
                'berat' => $request->berat_badan,
                'umur' => $request->umur,
                'tanggal_pengukuran' => now(),
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data anak berhasil ditambahkan',
            'data' => $anak->load('pengukuran')
        ]);
    }
}
