@extends('layouts.auth-layout')

@section('content')

<div class="min-h-screen bg-gray-100 flex items-center justify-center px-4">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-10">

        {{-- LOGO --}}
        <div class="text-center mb-7">
            <h1 class="text-3xl font-extrabold text-green-600">StuntingCare</h1>
            <p class="text-gray-500 text-sm mt-1">Daftar akun baru</p>
        </div>

        {{-- ERROR MESSAGE --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 px-4 py-3 rounded-lg mb-5 text-sm">
                <ul class="list-disc ml-4 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- REGISTER FORM --}}
        <form method="POST" action="{{ route('register.post') }}" autocomplete="off">
            @csrf

            {{-- Fake autofill blockers --}}
            <input type="text" name="fake_user" autocomplete="username" class="hidden">
            <input type="password" name="fake_pass" autocomplete="new-password" class="hidden">

            {{-- NAMA --}}
            <label class="block font-medium text-gray-700 mb-1">Nama Lengkap</label>
            <input 
                type="text"
                name="name"
                class="w-full border border-gray-300 px-4 py-3 rounded-lg bg-gray-50
                       focus:ring-2 focus:ring-green-500 outline-none transition mb-4"
                placeholder="Masukkan nama lengkap anda"
                required
            >

            {{-- EMAIL --}}
            <label class="block font-medium text-gray-700 mb-1">Email</label>
            <input 
                type="email"
                name="email"
                autocomplete="new-email"
                class="w-full border border-gray-300 px-4 py-3 rounded-lg bg-gray-50
                       focus:ring-2 focus:ring-green-500 outline-none transition mb-4"
                placeholder="Masukkan email anda"
                required
            >

            {{-- PASSWORD --}}
            <label class="block font-medium text-gray-700 mb-1">Password</label>
            <div class="relative mb-4">
                <input 
                    type="password"
                    id="passwordInput"
                    name="password"
                    autocomplete="new-password"
                    class="w-full border border-gray-300 px-4 py-3 rounded-lg bg-gray-50
                           focus:ring-2 focus:ring-green-500 outline-none transition pr-12"
                    placeholder="Masukkan password anda"
                    required
                >

                {{-- SHOW/HIDE --}}
                <button type="button"
                        onclick="togglePassword('passwordInput', 'eyeOpen1', 'eyeClosed1')"
                        class="absolute right-3 top-3 text-gray-500 hover:text-gray-700">

                    <svg id="eyeClosed1" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3 3l18 18M10.7 10.7A4 4 0 0112 8a4 4 0 014 4m3 3A9 9 0 0021 12c-.7-3.3-4.3-6-9-6m-5.5.5A9 9 0 003 12c.7 3.3 4.3 6 9 6" />
                    </svg>

                    <svg id="eyeOpen1" class="w-6 h-6 hidden" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 4.5C7 4.5 3 8 2 12c1 4 5 7.5 10 7.5s9-3.5 10-7.5c-1-4-5-7.5-10-7.5zm0 10a2.5 2.5 0 110-5 2.5 2.5 0 010 5z" />
                    </svg>
                </button>
            </div>

            {{-- CONFIRM PASSWORD --}}
            <label class="block font-medium text-gray-700 mb-1">Konfirmasi Password</label>
            <div class="relative mb-6">
                <input 
                    type="password"
                    id="confirmPasswordInput"
                    name="password_confirmation"
                    autocomplete="new-password"
                    class="w-full border border-gray-300 px-4 py-3 rounded-lg bg-gray-50
                           focus:ring-2 focus:ring-green-500 outline-none transition pr-12"
                    placeholder="Masukkan ulang password anda"
                    required
                >

                {{-- SHOW/HIDE --}}
                <button type="button"
                        onclick="togglePassword('confirmPasswordInput', 'eyeOpen2', 'eyeClosed2')"
                        class="absolute right-3 top-3 text-gray-500 hover:text-gray-700">

                    <svg id="eyeClosed2" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3 3l18 18M10.7 10.7A4 4 0 0112 8a4 4 0 014 4m3 3A9 9 0 0021 12c-.7-3.3-4.3-6-9-6m-5.5.5A9 9 0 003 12c.7 3.3 4.3 6 9 6" />
                    </svg>

                    <svg id="eyeOpen2" class="w-6 h-6 hidden" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 4.5C7 4.5 3 8 2 12c1 4 5 7.5 10 7.5s9-3.5 10-7.5c-1-4-5-7.5-10-7.5zm0 10a2.5 2.5 0 110-5 2.5 2.5 0 010 5z" />
                    </svg>
                </button>
            </div>

            {{-- BUTTON REGISTER --}}
            <button 
                type="submit"
                class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold text-lg
                       hover:bg-green-700 transition">
                Daftar Akun
            </button>

        </form>

        {{-- LOGIN LINK --}}
        <div class="text-center mt-6">
            <p class="text-gray-600 text-sm">
                Sudah punya akun?
                <a href="/login" class="text-green-600 font-semibold hover:underline">
                    Login
                </a>
            </p>
        </div>

    </div>

</div>

{{-- PASSWORD TOGGLE SCRIPT --}}
<script>
function togglePassword(id, eyeOpenId, eyeClosedId) {
    const input = document.getElementById(id);
    const eyeOpen = document.getElementById(eyeOpenId);
    const eyeClosed = document.getElementById(eyeClosedId);

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
