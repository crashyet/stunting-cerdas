@extends('layouts.user-layout')

@section('content')

@php
    // Animasi card hanya saat pertama load halaman (tanpa query)
    $animateCard = !request()->has('search') && !request()->has('usia');
@endphp

{{-- ================= HERO ================= --}}
<section class="bg-gradient-to-r from-green-50 to-blue-50 dark:from-gray-900 dark:to-gray-800 pt-10 pb-14 border-a transition-colors">
    <div class="px-6 md:px-10 lg:px-14">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-green-100 rounded-2xl flex items-center justify-center shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-7 h-7 text-green-600"
                     fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </div>

            <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900 dark:text-gray-100 leading-tight transition-colors">
                Rekomendasi <span class="text-green-600 dark:text-green-400">Makanan</span>
            </h1>
        </div>

        <p class="text-gray-600 dark:text-gray-400 mt-3 max-w-2xl text-sm md:text-base leading-relaxed transition-colors">
            Temukan menu makanan bergizi sesuai usia anak untuk mendukung pertumbuhan optimal.
        </p>
    </div>
</section>

{{-- ================= SEARCH + FILTER ================= --}}
<div class="sticky top-0 z-40 bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl py-5 shadow-sm border-b dark:border-gray-700 transition-colors">
    <form method="GET"
          class="px-6 md:px-14 flex flex-col md:flex-row justify-between items-center gap-4">

        {{-- SEARCH --}}
        <div class="w-full md:w-1/3 flex items-center bg-white dark:bg-gray-700 px-5 py-2.5 rounded-full
                    shadow-sm border border-gray-200 dark:border-gray-600 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-5 w-5 text-gray-400"
                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-4.35-4.35M10 18a8 8 0 100-16 8 8 0 000 16z"/>
            </svg>

            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="Cari makanan..."
                   class="ml-3 w-full bg-transparent text-sm focus:outline-none text-gray-900 dark:text-gray-100">
        </div>

        {{-- FILTER USIA --}}
        <div class="flex flex-wrap gap-3">
            @php $filter = request('usia') ?? 'all'; @endphp

            @foreach ([
                'all'=>'Semua Usia',
                '6-12'=>'6-12 bulan',
                '12-24'=>'12-24 bulan',
                '24-60'=>'24-60 bulan'
            ] as $key => $label)

            <button name="usia" value="{{ $key }}"
                class="px-5 py-2 rounded-full text-sm border
                {{ $filter == $key
                    ? 'bg-green-600 text-white shadow-md'
                    : 'bg-white text-gray-700 hover:bg-gray-100' }}">
                {{ $label }}
            </button>

            @endforeach
        </div>
    </form>
</div>

{{-- ================= TIPS GIZI ================= --}}

<div class="px-6 md:px-14 mt-10">
    <div class="bg-gradient-to-r from-green-50 to-blue-50 dark:from-green-900/20 dark:to-blue-900/20 p-6 rounded-2xl shadow-sm transition-colors">

        <h2 class="text-lg font-semibold mb-4 flex items-center gap-2 text-gray-900 dark:text-gray-100 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-500"
                 fill="none" viewBox="0 0 24 24" stroke-width="2"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 18v.01M12 14a4 4 0 10-4-4"/>
            </svg>
            Tips Gizi Harian
        </h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="bg-white dark:bg-gray-800 p-4 rounded-xl shadow-sm transition-colors">
                <p class="text-green-600 dark:text-green-400 font-bold text-xl transition-colors">15–25g</p>
                <p class="text-gray-600 dark:text-gray-400 text-sm transition-colors">Protein/hari</p>
            </div>
            <div class="bg-white dark:bg-gray-800 p-4 rounded-xl shadow-sm transition-colors">
                <p class="text-blue-600 dark:text-blue-400 font-bold text-xl transition-colors">130g</p>
                <p class="text-gray-600 dark:text-gray-400 text-sm transition-colors">Karbohidrat/hari</p>
            </div>
            <div class="bg-white dark:bg-gray-800 p-4 rounded-xl shadow-sm transition-colors">
                <p class="text-green-500 dark:text-green-400 font-bold text-xl transition-colors">30g</p>
                <p class="text-gray-600 dark:text-gray-400 text-sm transition-colors">Lemak/hari</p>
            </div>
            <div class="bg-white dark:bg-gray-800 p-4 rounded-xl shadow-sm transition-colors">
                <p class="text-blue-800 dark:text-blue-400 font-bold text-xl transition-colors">1000 kal</p>
                <p class="text-gray-600 dark:text-gray-400 text-sm transition-colors">Kalori/hari (1–3 th)</p>
            </div>
        </div>
    </div>
</div>

{{-- ================= GRID CARD MAKANAN ================= --}}

<div class="px-6 md:px-14 mt-10 pb-20 grid grid-cols-2 md:grid-cols-4 gap-6">

@foreach ($foods as $i => $food)
    <a href="{{ route('rekomendasi.show', $food->slug) }}" class="block">

    <div
    class="rounded-3xl border dark:border-gray-700 bg-white dark:bg-gray-800 shadow-sm overflow-hidden transition-colors
    {{ $animateCard ? 'animate-[fadeUp_'.(0.6 + ($i * 0.08)).'s_ease-out]' : '' }}">

    {{-- IMAGE --}}
    <div class="relative h-48 w-full overflow-hidden">
        <span
            class="absolute right-3 top-3 z-10 px-3 py-1 bg-blue-100 text-blue-700
                   text-[10px] rounded-full font-semibold shadow-sm">
            {{ $food['usia'] }} bulan
        </span>

        <img
            src="{{ asset('storage/' . $food['gambar']) }}"
            alt="{{ $food['judul'] }}"
            class="w-full h-full object-cover">
    </div>

    {{-- CONTENT --}}
    <div class="p-4">
        <h3 class="font-semibold text-sm md:text-base text-gray-900 dark:text-gray-100 transition-colors">
            {{ $food['judul'] }}
        </h3>

        <p class="text-gray-500 dark:text-gray-400 text-xs md:text-sm transition-colors">
            {{ $food['kategori'] }}
        </p>

        <div class="flex items-center gap-2 mt-4">
            <div class="flex-1 bg-green-50 py-2 px-4 rounded-xl text-center">
                <p class="text-green-600 text-[11px] font-medium">Kalori</p>
                <p class="text-green-700 font-bold text-lg">
                    {{ $food['kalori'] }}
                </p>
            </div>

            <div class="flex-1 bg-blue-50 py-2 px-4 rounded-xl text-center">
                <p class="text-blue-600 text-[11px] font-medium">Protein</p>
                <p class="text-blue-700 font-bold text-lg">
                    {{ $food['protein'] }}g
                </p>
            </div>
        </div>
    </div>
</div>
</a>

@endforeach
</div>

{{-- ================= KEYFRAME ================= --}}
<style>
@keyframes fadeUp {
    0% { opacity: 0; transform: translateY(14px); }
    100% { opacity: 1; transform: translateY(0); }
}
</style>

@endsection
