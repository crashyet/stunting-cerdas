<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Tampilkan semua user berdasarkan database yang sekarang.
     */
    public function index()
    {
        // Ambil semua user dari tabel users
        $users = User::all();

        return view('admin.user.index', compact('users'));
    }
}
