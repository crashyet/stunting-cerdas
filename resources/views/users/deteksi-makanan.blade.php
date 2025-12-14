@extends('layouts.user-layout')

@section('content')

{{-- ================= ANIMASI ================= --}}
<style>
@keyframes fadeUp {
    0% { opacity: 0; transform: translateY(14px); }
    100% { opacity: 1; transform: translateY(0); }
}
</style>

{{-- ====== HERO ====== --}}
<section class="bg-gradient-to-b from-[#E6F5EC] via-[#ECF5F1] to-[#F8FBFF] pt-10 pb-14">
    <div class="px-6 md:px-10 lg:px-14">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 bg-green-100 rounded-2xl flex items-center justify-center shadow-sm animate-[fadeUp_.6s_ease-out]">
                {{-- CAMERA ICON --}}
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-8 h-8 text-green-600"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 7h4l2-2h6l2 2h4v12H3V7z"/>
                    <circle cx="12" cy="13" r="3"/>
                </svg>
            </div>

            <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900 animate-[fadeUp_.7s_ease-out]">
                Deteksi <span class="text-green-600">Makanan</span>
            </h1>
        </div>

        <p class="text-gray-600 mt-3 max-w-2xl text-sm md:text-base animate-[fadeUp_.8s_ease-out]">
            Upload foto makanan untuk mendapatkan analisis gizi secara otomatis.
        </p>
    </div>
</section>

{{-- ====== MAIN CONTENT ====== --}}
<div class="container mx-auto px-6 md:px-14 mt-10 pb-24">
    <div class="grid md:grid-cols-2 gap-8 items-start">

        {{-- ===== KOLOM KIRI ===== --}}
        <div class="flex flex-col gap-8 ">

            {{-- === UPLOAD CARD === --}}
            <div class="bg-white rounded-3xl shadow-sm border p-6 animate-[fadeUp_1s_ease-out]">

                <h2 class="text-lg font-semibold flex items-center gap-2 mb-4">
                    {{-- UPLOAD ICON --}}
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5 text-green-600"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1M12 12v7m0-7l-3 3m3-3l3 3m-6-9h6"/>
                    </svg>
                    Upload Foto Makanan
                </h2>

                <div class="border-2 border-dashed border-green-200 rounded-2xl p-10
                            flex flex-col items-center justify-center text-center
                            bg-green-50/40">

                    <div class="w-16 h-16 bg-green-100 rounded-full
                                flex items-center justify-center mb-4">
                        {{-- IMAGE ICON --}}
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-8 h-8 text-green-600"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 16l4-4a3 3 0 014 0l4 4m-8-8h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>

                    <p class="font-medium text-gray-700">
                        Klik atau drag foto ke sini
                    </p>
                    <p class="text-sm text-gray-500 mt-1">
                        Format: JPG, PNG, WEBP (Maks. 10MB)
                    </p>

                    <button
                        class="mt-4 px-6 py-2.5 border border-gray-300 rounded-xl
                               text-sm font-medium hover:bg-gray-50 transition
                               flex items-center gap-2">

                        {{-- BUTTON ICON --}}
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-4 h-4"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 4v16m8-8H4"/>
                        </svg>
                        Pilih Gambar
                    </button>
                </div>
            </div>

            {{-- === TIPS FOTO === --}}
            <div class="rounded-2xl p-5 bg-gradient-to-r from-blue-50 via-blue-100/50 to-blue-50 border border-blue-200 shadow-sm animate-[fadeUp_1s_ease-out]">
                <h3 class="font-semibold mb-4 flex items-center gap-2">
                    {{-- LIGHT BULB ICON --}}
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5 text-yellow-500"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 3a7 7 0 00-4 12v2h8v-2a7 7 0 00-4-12z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 21h6"/>
                    </svg>
                    Tips Foto yang Baik
                </h3>

                <ul class="space-y-3 text-sm text-gray-700">

                    @foreach ([
                        'Pastikan pencahayaan cukup terang',
                        'Ambil foto dari atas (bird’s eye view)',
                        'Fokus pada satu jenis makanan',
                        'Hindari bayangan atau pantulan berlebih'
                    ] as $tip)

                    <li class="flex items-start gap-2">
                        {{-- CHECK ICON --}}
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-4 h-4 text-green-600 mt-0.5"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5 13l4 4L19 7"/>
                        </svg>
                        {{ $tip }}
                    </li>

                    @endforeach
                </ul>
            </div>
        </div>

        {{-- ===== KOLOM KANAN ===== --}}
        <div class="bg-white rounded-3xl shadow-sm border
                    p-10 h-full flex flex-col items-center justify-center
                    text-center animate-[fadeUp_1.2s_ease-out]">

            <div class="w-20 h-20 bg-gray-100 rounded-full
                        flex items-center justify-center mb-6">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-10 h-10 text-gray-400"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M7 3H5a2 2 0 00-2 2v2m0 10v2a2 2 0 002 2h2m10-18h2a2 2 0 012 2v2m0 10v2a2 2 0 01-2 2h-2"/>
                </svg>
            </div>

            <h3 class="text-lg font-semibold text-gray-700">
                Belum Ada Hasil
            </h3>

            <p class="text-gray-500 text-sm mt-2 max-w-sm">
                Upload foto makanan dan klik tombol
                <strong>Deteksi Makanan</strong> untuk mendapatkan
                analisis gizi lengkap.
            </p>
        </div>
    </div>
</div>

@endsection
