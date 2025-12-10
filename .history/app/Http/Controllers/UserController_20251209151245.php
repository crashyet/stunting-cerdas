<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // ambil semua user
        
        return view('admin.manajemen-user', compact('users'));
    }
    public function destroy($id)
{
    $user = User::findOrFail($id);

    // jangan biarkan admin menghapus dirinya sendiri (opsional)
    if ($user->id == auth()->id()) {
        return redirect()->back()->with('error', 'Tidak bisa menghapus akun sendiri!');
    }

    $user->delete();

    return redirect()->back()->with('success', 'User berhasil dihapus!');
}

}
