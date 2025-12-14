@extends('layouts.user-layout')

@section('content')

{{-- ========================== HERO ========================== --}}
<section class="relative w-screen left-1/2 right-1/2 -ml-[50vw] -mr-[50vw]
    bg-gradient-to-r from-green-50 to-blue-50
    pt-10 pb-14 md:pt-12 md:pb-12 border-a
    animate-[fadeUp_.5s_ease-out]">

    <div class="pl-6 md:pl-14 lg:pl-20 pr-6 animate-[fadeUp_.6s_ease-out]">

        <div class="flex items-center gap-4 animate-[fadeUp_.7s_ease-out]">
            {{-- ICON REKOMENDASI --}}
            <div class="w-12 h-12 bg-green-100 rounded-2xl flex items-center justify-center shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-green-600"
                    fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </div>

            <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900 leading-tight">
                Rekomendasi <span class="text-green-600">Makanan</span>
            </h1>
        </div>

        <p class="text-gray-600 mt-3 max-w-2xl text-sm md:text-base leading-relaxed animate-[fadeUp_.8s_ease-out]">
            Temukan menu makanan bergizi sesuai usia anak untuk mendukung pertumbuhan optimal.
        </p>
    </div>
</section>



{{-- ========================== SEARCH + FILTER ========================== --}}
<div class="sticky top-[72px] z-40 bg-white/80 backdrop-blur-xl py-5 shadow-sm border-b animate-[fadeUp_.9s_ease-out]">

    <div class="px-6 md:px-14 flex flex-col md:flex-row justify-between items-center gap-4">

        {{-- SEARCH BAR --}}
        <div class="w-full md:w-1/3 flex items-center bg-white px-5 py-2.5 rounded-full
            shadow-sm border border-gray-200 animate-[fadeUp_1s_ease-out]">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 text-gray-400"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-4.35-4.35M10 18a8 8 0 100-16 8 8 0 000 16z" />
            </svg>

            <input type="text" name="search" value="{{ request('search') }}"
                placeholder="Cari makanan..."
                class="ml-3 w-full bg-transparent text-sm focus:outline-none">
        </div>

        {{-- FILTER --}}
        <div class="flex flex-wrap gap-3 animate-[fadeUp_1.1s_ease-out]">

            @php $filter = request('usia') ?? 'all'; @endphp

            @foreach ([
                'all'=>'Semua Usia',
                '6-12'=>'6-12 bulan',
                '12-24'=>'12-24 bulan',
                '24-60'=>'24-60 bulan'
            ] as $key => $label)

            <a href="{{ route('user.rekomendasi', ['usia'=>$key]) }}"
                class="px-5 py-2 rounded-full text-sm border transition-all
                {{ $filter == $key ? 'bg-green-600 text-white shadow-md' : 'bg-white text-gray-700 hover:bg-gray-100' }}">
                {{ $label }}
            </a>

            @endforeach
        </div>

    </div>
</div>



{{-- ========================== TIPS GIZI ========================== --}}
<div class="px-6 md:px-14 mt-10 animate-[fadeUp_1.2s_ease-out]">
    <div class="bg-gradient-to-r from-green-50 to-blue-50 p-6 rounded-2xl shadow-sm">

        <h2 class="text-lg font-semibold mb-4 flex items-center gap-2 animate-[fadeUp_1.3s_ease-out]">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-500"
                fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 18v.01M12 14a4 4 0 10-4-4" />
            </svg>
            Tips Gizi Harian
        </h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

            <div class="bg-white p-4 rounded-xl shadow-sm animate-[fadeUp_1.4s_ease-out]">
                <p class="text-green-600 font-bold text-xl">15–25g</p>
                <p class="text-gray-600 text-sm">Protein/hari</p>
            </div>

            <div class="bg-white p-4 rounded-xl shadow-sm animate-[fadeUp_1.5s_ease-out]">
                <p class="text-blue-600 font-bold text-xl">130g</p>
                <p class="text-gray-600 text-sm">Karbohidrat/hari</p>
            </div>

            <div class="bg-white p-4 rounded-xl shadow-sm animate-[fadeUp_1.6s_ease-out]">
                <p class="text-green-500 font-bold text-xl">30g</p>
                <p class="text-gray-600 text-sm">Lemak/hari</p>
            </div>

            <div class="bg-white p-4 rounded-xl shadow-sm animate-[fadeUp_1.7s_ease-out]">
                <p class="text-blue-800 font-bold text-xl">1000 kal</p>
                <p class="text-gray-600 text-sm">Kalori/hari (1–3 th)</p>
            </div>

        </div>
    </div>
</div>



{{-- ==================== GRID CARD MAKANAN ==================== --}}
<div class="px-6 md:px-14 mt-10 pb-20 grid grid-cols-2 md:grid-cols-4 gap-6">

@foreach ($foods as $i => $food)

    <div class="rounded-3xl border bg-white shadow-sm hover:shadow-lg transition-all overflow-hidden
                animate-[fadeUp_{{ 1.8 + ($i * 0.1) }}s_ease-out]">

        {{-- HEADER --}}
        <div class="h-48 bg-gradient-to-b from-green-50 to-blue-50
            flex items-center justify-center relative">

            <span class="absolute right-3 top-3 px-3 py-1 bg-blue-100 text-blue-700
                text-[10px] rounded-full font-semibold shadow-sm">
                {{ $food['usia'] }} bulan
            </span>

            <img src="" class="w-16 opacity-90">
        </div>

        {{-- CONTENT --}}
        <div class="p-4">

            <h3 class="font-semibold text-sm md:text-base">{{ $food['nama'] }}</h3>
            <p class="text-gray-500 text-xs md:text-sm">{{ $food['kategori'] }}</p>

            {{-- NUTRISI --}}
            <div class="flex items-center gap-2 mt-4">

                <div class="flex-1 bg-green-50 py-2 px-4 rounded-xl text-center">
                    <p class="text-green-600 text-[11px] font-medium">Kalori</p>
                    <p class="text-green-700 font-bold text-lg">{{ $food['kalori'] }}</p>
                </div>

                <div class="flex-1 bg-blue-50 py-2 px-4 rounded-xl text-center">
                    <p class="text-blue-600 text-[11px] font-medium">Protein</p>
                    <p class="text-blue-700 font-bold text-lg">{{ $food['protein'] }}g</p>
                </div>

            </div>

            {{-- VITAMIN --}}
            <div class="flex gap-1 mt-3 flex-wrap">
                
            </div>

        </div>

    </div>

@endforeach

</div>



{{-- ========== KEYFRAMES ========== --}}
<style>
@keyframes fadeUp {
    0% { opacity: 0; transform: translateY(14px); }
    100% { opacity: 1; transform: translateY(0); }
}
</style>

@endsection
