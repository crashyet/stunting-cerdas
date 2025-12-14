<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // ===========================
    // LOGIN
    // ===========================
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {

            $user = Auth::user();

            // Redirect berdasarkan role
            if ($user->role === 'admin') {
                return redirect('/admin/dashboard');
            }

            return redirect('/edukasi');
        }

        return back()->with('error', 'Email atau password salah.');
    }


    // ===========================
    // REGISTER
    // ===========================
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validasi
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Simpan user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'user',  // default user
        ]);

        // Login otomatis setelah register
        Auth::login($user);

        return redirect('/dashboard');
    }


    // ===========================
    // LOGOUT
    // ===========================
    public function logout()
    {
        Auth::logout();
        return redirect()->route('landing');
    }
}
