@extends('layouts.user-layout')

@section('content')

@php
    // MATIKAN ANIMASI SAAT SEARCH / FILTER
    $disableAnimation = request()->has('search') || request()->has('filter');
@endphp

{{-- ========================== HERO ========================== --}}
<section
    class="bg-gradient-to-b from-[#E6F5EC] via-[#ECF5F1] to-[#F8FBFF] pt-10 pb-14 border-a
    {{ $disableAnimation ? '' : 'animate-[fadeUp_.6s_ease-out]' }}">
    <div class="px-6 md:px-10 lg:px-14">
        <div class="flex items-center gap-4">
            <div
                class="w-14 h-14 bg-green-100 rounded-2xl flex items-center justify-center shadow-sm
                {{ $disableAnimation ? '' : 'animate-[fadeUp_.8s_ease-out]' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-green-600"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2zM8 11h8M8 15h5"/>
                </svg>
            </div>

            <h1
                class="text-2xl md:text-3xl font-extrabold text-gray-900 leading-tight
                {{ $disableAnimation ? '' : 'animate-[fadeUp_.9s_ease-out]' }}">
                Edukasi <span class="text-green-600">Stunting</span>
            </h1>
        </div>

        <p
            class="text-gray-600 mt-3 max-w-2xl text-sm md:text-base leading-relaxed
            {{ $disableAnimation ? '' : 'animate-[fadeUp_1s_ease-out]' }}">
            Pelajari semua yang perlu Anda ketahui tentang stunting, cara pencegahan,
            dan tips nutrisi untuk anak.
        </p>
    </div>
</section>

{{-- ====== SEARCH & FILTER ========= --}}
<div
    class="sticky top-0 z-30 bg-white/80 backdrop-blur-xl py-4 shadow-sm border-b
    {{ $disableAnimation ? '' : 'animate-[fadeUp_1.1s_ease-out]' }}">
    <form method="GET"
          class="px-6 md:px-10 lg:px-14 flex flex-col md:flex-row justify-between items-center gap-4">

        {{-- SEARCH --}}
        <div
            class="w-full md:w-1/3 flex items-center bg-white px-5 py-2.5 rounded-full
                   shadow-sm border border-gray-200
                   {{ $disableAnimation ? '' : 'animate-[fadeUp_1.2s_ease-out]' }}">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-5 w-5 text-gray-400"
                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-4.35-4.35M10 18a8 8 0 100-16 8 8 0 000 16z"/>
            </svg>
            <input type="text" name="search" value="{{ $search }}"
                   placeholder="Cari artikel..."
                   class="ml-3 w-full bg-transparent text-sm focus:outline-none">
        </div>

        {{-- FILTER --}}
        <div class="flex flex-wrap gap-2">
            @php
                $filters = ['Semua','Edukasi','Panduan','Nutrisi','Kesehatan'];
            @endphp

            @foreach ($filters as $i => $f)
                <button name="filter" value="{{ $f }}"
                    class="px-4 py-1.5 rounded-full text-sm transition-none
                    {{ $selectedFilter == $f
                        ? 'bg-green-600 text-white shadow-[0_4px_18px_rgba(34,197,94,0.35)]'
                        : 'border border-gray-300 text-gray-700 hover:bg-gray-100' }}
                    {{ $disableAnimation ? '' : 'animate-[fadeUp_'.(1.3 + ($i * 0.1)).'s_ease-out]' }}">
                    {{ $f }}
                </button>
            @endforeach
        </div>
    </form>
</div>

{{-- ======== GRID ARTIKEL ======= --}}
<div class="px-6 md:px-10 lg:px-14 mt-14 pb-20 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">

    @forelse($articles as $index => $card)

        <div
            class="rounded-3xl border border-gray-200 bg-white shadow-sm overflow-hidden
            {{ $disableAnimation ? '' : 'animate-[fadeUp_'.(1.5 + ($index * 0.12)).'s_ease-out]' }}">

            <div class="h-44 bg-gradient-to-b from-blue-50 to-white flex items-center justify-center">
                @if($card->thumbnail)
                    <img src="{{ asset('storage/' . $card->thumbnail) }}"
                         class="h-full w-full object-cover">
                @else
                    <img src="https://via.placeholder.com/300x200?text=No+Image"
                         class="opacity-70">
                @endif
            </div>

            <div class="p-6">
                <h3 class="font-semibold text-lg leading-snug">
                    {{ $card->judul }}
                </h3>

                <p class="text-gray-600 text-sm mt-2 leading-relaxed">
                    {{ $card->intro }}
                </p>

                <div class="mt-4 flex justify-between items-center">
                    <p class="text-gray-400 text-xs">{{ $card->waktu_baca }} menit</p>
                    <a href="{{ route('user.edukasi.detail', $card->slug) }}"
                       class="text-green-600 font-medium text-sm hover:underline">
                        Baca →
                    </a>
                </div>
            </div>
        </div>

    @empty
        <p class="col-span-full text-center text-gray-500">
            Tidak ada artikel ditemukan.
        </p>
    @endforelse
</div>

{{-- ========== FADE UP KEYFRAME ========== --}}
<style>
@keyframes fadeUp {
    0% { opacity: 0; transform: translateY(14px); }
    100% { opacity: 1; transform: translateY(0); }
}
</style>

@endsection
