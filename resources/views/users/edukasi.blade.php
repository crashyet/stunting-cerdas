@extends('layouts.user-layout')

@section('content')

{{-- ========================== HERO ========================== --}}
<section class="relative w-screen left-1/2 right-1/2 -ml-[50vw] -mr-[50vw]
    bg-gradient-to-b from-[#E6F5EC] via-[#ECF5F1] to-[#F8FBFF]
    pt-10 pb-14 md:pt-12 md:pb-12 border-a
    animate-[fadeUp_.6s_ease-out]">

    <div class="pl-6 md:pl-14 lg:pl-20 pr-6 animate-[fadeUp_.7s_ease-out]">

        <div class="flex items-center gap-4">

            {{-- ICON --}}
            <div class="w-14 h-14 bg-green-100 rounded-2xl flex items-center justify-center shadow-sm animate-[fadeUp_.8s_ease-out]">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-green-600"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2zM8 11h8M8 15h5" />
                </svg>
            </div>

            <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900 leading-tight animate-[fadeUp_.9s_ease-out]">
                Edukasi <span class="text-green-600">Stunting</span>
            </h1>

        </div>

        <p class="text-gray-600 mt-3 max-w-2xl text-sm md:text-base leading-relaxed animate-[fadeUp_1s_ease-out]">
            Pelajari semua yang perlu Anda ketahui tentang stunting, cara pencegahan,
            dan tips nutrisi untuk anak.
        </p>

    </div>
</section>



{{-- ==================== SEARCH & FILTER ==================== --}}
<div class="sticky top-[72px] z-40 bg-white/70 backdrop-blur-xl py-4 shadow-sm border-b animate-[fadeUp_1.1s_ease-out]">

    <form method="GET"
          class="px-6 md:px-14 flex flex-col md:flex-row justify-between items-center gap-4 animate-[fadeUp_1.2s_ease-out]">

        {{-- SEARCH BAR --}}
        <div class="w-full md:w-1/3 flex items-center bg-white px-5 py-2.5 rounded-full
                    shadow-sm border border-gray-200 animate-[fadeUp_1.3s_ease-out]">

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-5 w-5 text-gray-400"
                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-4.35-4.35M10 18a8 8 0 100-16 8 8 0 000 16z" />
            </svg>

            <input type="text" name="search" value="{{ $search }}"
                   placeholder="Cari artikel..."
                   class="ml-3 w-full bg-transparent text-sm focus:outline-none">
        </div>

        {{-- FILTER BUTTONS --}}
        <div class="flex flex-wrap gap-2 animate-[fadeUp_1.4s_ease-out]">
            @php
                $filters = ['Semua','Edukasi','Panduan','Nutrisi','Kesehatan'];
            @endphp

            @foreach ($filters as $i => $f)
            <button name="filter" value="{{ $f }}"
                class="px-4 py-1.5 rounded-full text-sm transition-all
                    {{ $selectedFilter == $f
                        ? 'bg-green-600 text-white shadow-[0_4px_18px_rgba(34,197,94,0.35)]'
                        : 'border border-gray-300 text-gray-700 hover:bg-gray-100' }}
                    animate-[fadeUp_{{ 1.5 + ($i * 0.1) }}s_ease-out]">
                {{ $f }}
            </button>
            @endforeach
        </div>

    </form>

</div>



{{-- ========================== GRID ARTIKEL ========================== --}}
<div class="px-6 md:px-14 mt-14 pb-20 grid md:grid-cols-3 gap-10">

    @forelse($articles as $index => $card)

    <div class="rounded-3xl border border-gray-200 bg-white shadow-sm
                hover:shadow-lg transition-all duration-200 overflow-hidden
                animate-[fadeUp_{{ 1.6 + ($index * 0.12) }}s_ease-out]">

        {{-- IMAGE --}}
        <div class="h-44 bg-gradient-to-b from-blue-50 to-white flex items-center justify-center">
            <img src="{{ asset('storage/' . $card['thumbnail']) }}" class="w-16 opacity-90">
        </div>

        <div class="p-6">

            {{-- CATEGORY --}}
            @php
                $color = match($card['kategori']) {
                    'Edukasi'   => 'bg-blue-100 text-blue-700',
                    'Panduan'   => 'bg-green-100 text-green-700',
                    'Nutrisi'   => 'bg-yellow-100 text-yellow-700',
                    'Kesehatan' => 'bg-teal-100 text-teal-700',
                    default     => 'bg-gray-100 text-gray-700'
                };
            @endphp

            <span class="px-3 py-1 text-xs rounded-full font-medium {{ $color }}">
                {{ $card['kategori'] }}
            </span>

            {{-- TITLE --}}
            <h3 class="font-semibold text-lg mt-3 leading-snug">
                {{ $card['judul'] }}
            </h3>

            {{-- DESCRIPTION --}}
            <p class="text-gray-600 text-sm mt-2 leading-relaxed">
                {{ $card['deskripsi'] }}
            </p>

            {{-- FOOTER --}}
            <div class="mt-4 flex justify-between items-center">
                <p class="text-gray-400 text-xs">{{ $card['waktu'] }}</p>
                <a href="#" class="text-green-600 font-medium text-sm hover:underline">Baca →</a>
            </div>

        </div>
    </div>

    @empty

        <p class="col-span-3 text-center text-gray-500 animate-[fadeUp_1.6s_ease-out]">
            Tidak ada artikel ditemukan.
        </p>

    @endforelse

</div>



{{-- ========== FADE UP KEYFRAME ========== --}}
<style>
@keyframes fadeUp {
    0% { opacity: 0; transform: translateY(14px); }
    100% { opacity: 1; transform: translateY(0px); }
}
</style>

@endsection
