<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use Illuminate\Support\Facades\Auth;

class CekStuntingController extends Controller
{
    public function index()
    {
        // ambil anak milik user login
        $anak = Anak::where('user_id', Auth::id())->get();

        return view('users.cek-stunting', compact('anak'));
    }
}
