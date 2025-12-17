@extends('layouts.auth-layout')

@section('content')

<div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex items-center justify-center px-4 transition-colors">

    <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-10 transition-colors">

        {{-- Brand --}}
        <div class="text-center mb-7">
            <h1 class="text-3xl font-extrabold text-green-600 dark:text-green-400 transition-colors">Cegah Stunting</h1>
            <p class="text-gray-500 dark:text-gray-400 text-sm mt-1 transition-colors">Masuk ke akun Anda</p>
        </div>

        {{-- Error Message --}}
        @if(session('error'))
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded-lg mb-4 text-sm">
                {{ session('error') }}
            </div>
        @endif

        {{-- LOGIN FORM (anti-autofill) --}}
        <form method="POST" action="{{ route('login.post') }}" autocomplete="off">
            @csrf

            {{-- Fake fields to prevent autofill --}}
            <input type="text" name="fake_username" autocomplete="username" class="hidden">
            <input type="password" name="fake_password" autocomplete="new-password" class="hidden">

            {{-- EMAIL --}}
            <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1 transition-colors">Email</label>

            <input 
                type="email"
                name="email"
                autocomplete="new-email"
                class="w-full border border-gray-300 dark:border-gray-600 px-4 py-3 rounded-lg bg-gray-50 dark:bg-gray-700
                       text-gray-900 dark:text-gray-100
                       focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none
                       mb-5 transition"
                placeholder="Masukkan email anda"
                required
            />

            {{-- PASSWORD --}}
            <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1 transition-colors">Password</label>

            <div class="relative mb-3">
                <input 
                    type="password"
                    id="passwordInput"
                    name="password"
                    autocomplete="new-password"
                    class="w-full border border-gray-300 dark:border-gray-600 px-4 py-3 rounded-lg bg-gray-50 dark:bg-gray-700
                           text-gray-900 dark:text-gray-100
                           focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none
                           pr-12 transition"
                    placeholder="Masukkan password anda"
                    required
                />

                {{-- Eye Toggle Button --}}
                <button type="button"
                        onclick="togglePassword()"
                        class="absolute right-3 top-3 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition">

                    {{-- Eye Closed --}}
                    <svg id="eyeClosed" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3 3l18 18M10.7 10.7A4 4 0 0112 8a4 4 0 014 4m3 3A9 9 0 0021 12c-.7-3.3-4.3-6-9-6m-5.5.5A9 9 0 003 12c.7 3.3 4.3 6 9 6" />
                    </svg>

                    {{-- Eye Open --}}
                    <svg id="eyeOpen" class="w-6 h-6 hidden" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 4.5C7 4.5 3 8 2 12c1 4 5 7.5 10 7.5s9-3.5 10-7.5c-1-4-5-7.5-10-7.5zm0 10a2.5 2.5 0 110-5 2.5 2.5 0 010 5z" />
                    </svg>

                </button>
            </div>

            {{-- Forgot Password --}}
            <div class="flex justify-end mb-6">
                <a href="#" class="text-sm text-green-600 hover:underline">
                    Lupa Password?
                </a>
            </div>

            {{-- Login Button --}}
            <button 
                type="submit"
                class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold text-lg
                       hover:bg-green-700 transition focus:ring-2 focus:ring-green-400">
                Login
            </button>

        </form>

        {{-- Register --}}
        <div class="text-center mt-6">
            <p class="text-gray-600 dark:text-gray-400 text-sm transition-colors">
                Belum punya akun?
                <a href="/register" class="text-green-600 font-semibold hover:underline">
                    Daftar Sekarang
                </a>
            </p>
        </div>

    </div>
</div>

{{-- PASSWORD TOGGLE SCRIPT --}}
<script>
function togglePassword() {
    const input = document.getElementById('passwordInput');
    const eyeOpen = document.getElementById('eyeOpen');
    const eyeClosed = document.getElementById('eyeClosed');

    if (input.type === "password") {
        input.type = "text";
        eyeOpen.classList.remove("hidden");
        eyeClosed.classList.add("hidden");
    } else {
        input.type = "password";
        eyeOpen.classList.add("hidden");
        eyeClosed.classList.remove("hidden");
    }
}
</script>

@endsection
