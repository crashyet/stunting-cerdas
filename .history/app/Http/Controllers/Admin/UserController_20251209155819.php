<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // ambil semua user
        $totalUsers = User::count();
        
        return view('admin.manajemen-user', compact('users','totalUsers'));
    }
    
    public function destroy(User $user)
{
    // Cegah menghapus user dengan role admin
    if ($user->role === 'admin') {
        return redirect()
            ->route('admin.users.index')
            ->with('error', 'User dengan role Admin tidak dapat dihapus!');
    }

    // Cegah admin menghapus akun dirinya sendiri
    if (auth()->id() === $user->id) {
        return redirect()
            ->route('admin.users.index')
            ->with('error', 'Anda tidak dapat menghapus akun Anda sendiri!');
    }

    // Hapus user
    $user->delete();

    return redirect()
        ->route('admin.users.index')
        ->with('success', 'Pengguna berhasil dihapus.');
}


}
