<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Menampilkan semua user yang aktif.
     */
    public function index()
    {
        // Ambil semua user yang status = 'aktif'
        $users = User::where('status', 'aktif')->get();

        return view('admin.user.index', compact('users'));
    }

    /**
     * Menampilkan semua user tanpa filter (opsional).
     */
    public function allUsers()
    {
        $users = User::all();

        return view('admin.user.index-all', compact('users'));
    }

    /**
     * Menampilkan detail user berdasarkan id.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.user.show', compact('user'));
    }

    /**
     * Reset password user ke default (opsional).
     */
    public function resetPassword($id)
    {
        $user = User::findOrFail($id);

        // Set password default (contoh: "password123")
        $user->password = bcrypt('password123');
        $user->save();

        return redirect()->back()->with('success', 'Password berhasil direset!');
    }

    /**
     * Update status user (aktif / nonaktif).
     */
    public function updateStatus(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->status = $request->status;
        $user->save();

        return redirect()->back()->with('success', 'Status user berhasil diperbarui!');
    }
}
