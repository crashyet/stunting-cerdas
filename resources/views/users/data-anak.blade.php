@extends('layouts.user-layout')

@section('content')
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<div 
    x-data="{ openAdd: false }"
    x-effect="document.body.classList.toggle('overflow-hidden', openAdd)"
>

{{-- ======= HERO ======== --}}
<section class="bg-gradient-to-b from-[#E6F5EC] via-[#ECF5F1] to-[#F8FBFF] pt-10 pb-14 border-a animate-[fadeUp_.5s_ease-out]">
    <div class="px-6 md:px-10 lg:px-14 animate-[fadeUp_.6s_ease-out]">
        <div class="flex items-center gap-4 animate-[fadeUp_.7s_ease-out]">
            <div class="w-12 h-12 bg-green-100 rounded-2xl flex items-center justify-center shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-green-600" fill="none"
                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 12c2.2 0 4-1.8 4-4s-1.8-4-4-4-4 1.8-4 4 1.8 4 4 4zm-5 8c0-3 2.3-4 5-4s5 1 5 4v1H7v-1z"/>
                </svg>
            </div>

            <h1 class="text-2xl md:text-3xl font-extrabold">
                Data <span class="text-green-600">Anak</span>
            </h1>

        </div>
        <p class="text-gray-600 mt-3 max-w-2xl text-sm md:text-base leading-relaxed
                  animate-[fadeUp_.8s_ease-out]">
            Kelola data anak Anda untuk pemantauan pertumbuhan yang lebih baik.
        </p>
    </div>
</section>


{{-- ===== STICKY NAVBAR ====== --}}
<div class="sticky top-0 z-40 bg-white/70 backdrop-blur-xl py-4 shadow-sm border-b animate-[fadeUp_.9s_ease-out]">

    <div class="px-6 md:px-14 flex flex-col md:flex-row justify-between items-center gap-4">
        <div class="w-full md:w-1/3 flex items-center bg-white px-4 py-2 rounded-full
                    shadow-sm border border-gray-200 animate-[fadeUp_1s_ease-out]">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-5 w-5 text-gray-400"
                 fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 21l-4.35-4.35M10 18a8 8 0 100-16 8 8 0 000 16z" />
            </svg>

            <input type="text" placeholder="Cari anak..."
                class="ml-3 w-full bg-transparent text-sm focus:outline-none">
        </div>

        <a href="#"
           class="px-6 py-2.5 bg-green-600 text-white rounded-full shadow hover:bg-green-700 transition text-sm font-semibold animate-[fadeUp_1.1s_ease-out]">
            + Tambah Anak
        </button>

    </div>
</div>

{{-- ======= LIST DATA ANAK ======== --}}
<div class="px-5 md:px-5 mt-10 pb-5 grid md:grid-cols-3 gap-0">

    @foreach([1,2,3] as $i)
    <div class="rounded-3xl border bg-white shadow-sm hover:shadow-lg transition-all p-5 scale-[0.85] origin-top
                animate-[fadeUp_{{ 1.2 + ($i * 0.1) }}s_ease-out]">

        {{-- ========= HEADER ========= --}}
        <div class="flex justify-between items-center mb-4">

            <div class="flex items-center gap-3">
                
                @if($i == 1)
                {{-- Boy --}}
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-7 h-7 text-blue-500"
                     fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 12c2.3 0 4-1.7 4-4s-1.7-4-4-4-4 1.7-4 4 1.7 4 4 4zm6 8v-1.5c0-2.5-3.6-3.5-6-3.5s-6 1-6 3.5V20h12z"/>
                </svg>
                @else
                {{-- Girl --}}
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-7 h-7 text-pink-500"
                     fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 12c2.3 0 4-1.7 4-4s-1.7-4-4-4-4 1.7-4 4 1.7 4 4 4zm-5 8c0-3 2.2-4 5-4s5 1 5 4H7z"/>
                </svg>
                @endif

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-sm font-medium">Umur (bulan)</label>
                    <input type="number" name="umur" required
                        class="w-full rounded-md border px-3 py-2 focus:ring-2 focus:ring-green-500">
                </div>

        {{-- ========= INFO BAR ========= --}}
        <div class="grid grid-cols-3 gap-3">
            <div class="bg-gray-50 rounded-2xl p-3 text-center shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-4 h-4 mx-auto text-gray-400 mb-1"
                     fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 3v18m4-4H8m4-4H8m4-4H8"/>
                </svg>
                <h2 class="text-lg font-bold">
                    {{ $i == 1 ? '85' : ($i==2 ? '92' : '78') }}
                </h2>
                <span class="text-gray-400 text-xs">cm</span>
            </div>

            <div class="bg-gray-50 rounded-2xl p-3 text-center shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-4 h-4 mx-auto text-gray-400 mb-1"
                     fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M6 3h12l-1 7H7L6 3zm3 14a3 3 0 006 0H9z"/>
                </svg>
                <h2 class="text-lg font-bold">
                    {{ $i == 1 ? '12' : ($i==2 ? '14' : '10') }}
                </h2>
                <span class="text-gray-400 text-xs">kg</span>
            </div>

            <div class="bg-gray-50 rounded-2xl p-3 text-center shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-4 h-4 mx-auto text-gray-400 mb-1"
                     fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <h2 class="text-lg font-bold">
                    {{ $i == 1 ? '20 Jan' : ($i==2 ? '25 Jan' : '10 Feb') }}
                </h2>
            </div>
        </div>
    </div>
    @endforeach
</div>

{{-- ======= KEYFRAMES ====== --}}
<style>
@keyframes fadeUp {
    from { opacity: 0; transform: translateY(14px); }
    to { opacity: 1; transform: translateY(0); }
}
.animate-\[fadeUp_ease-out\] {
    animation-name: fadeUp;
    animation-timing-function: ease-out;
    animation-fill-mode: both;
}
[x-cloak] { display: none !important; }
</style>

</div>
@endsection
