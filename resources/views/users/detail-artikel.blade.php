@extends('layouts.user-layout')

@section('content')

{{-- ================= ANIMASI (KODE LAMA DIPERTAHANKAN) ================= --}}
<style>
@keyframes fadeUp {
    0% { opacity: 0; transform: translateY(14px); }
    100% { opacity: 1; transform: translateY(0); }
}

/* ===== RAPIN KONTEN ARTIKEL ===== */
.article-content h2 {
    font-size: 1.5rem;
    font-weight: 700;
    margin-top: 2.5rem;
    margin-bottom: 1rem;
    color: #111827;
}

.article-content ul {
    list-style: disc;
    padding-left: 1.5rem;
    margin: 1rem 0;
}

.article-content ol {
    list-style: decimal;
    padding-left: 1.5rem;
    margin: 1rem 0;
}

.article-content li {
    margin-bottom: .5rem;
    color: #374151;
}

/* ===== HIGHLIGHT BOX ===== */
.highlight-box {
    background: #ecfdf5;
    border-left: 4px solid #22c55e;
    padding: 1rem 1.25rem;
    border-radius: .75rem;
    margin: 2rem 0;
    color: #166534;
}
</style>

{{-- ================= HEADER ARTIKEL ================= --}}
<div class="px-6 md:px-20 lg:px-52 py-10">
    {{-- BACK BUTTON --}}
    <div class="container mx-auto px-4 py-6">
        <a href="{{ route('user.edukasi') }}"
           class="inline-flex items-center gap-2 px-5 py-2 rounded-xl
                  text-sm font-semibold hover:bg-gray-100 transition">
            ← Kembali
        </a>
    </div>

    {{-- KATEGORI --}}
    <span
        class="inline-block px-4 py-1 bg-green-100 text-green-700
               rounded-full text-sm font-semibold
               animate-[fadeUp_.5s_ease-out]">
        {{ $artikel->kategori }}
    </span>

    {{-- JUDUL --}}
    <h1
        class="text-3xl md:text-4xl font-bold text-gray-900
               leading-tight mt-4
               animate-[fadeUp_.6s_ease-out]">
        {{ $artikel->judul }}
    </h1>

    {{-- META (SVG ASLI — TIDAK DIUBAH) --}}
    <div
        class="flex flex-wrap items-center gap-6
               text-sm text-gray-500 mt-6
               animate-[fadeUp_.8s_ease-out]">

        {{-- PENULIS --}}
        <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                      d="M5.121 17.804A13.937 13.937 0 0112 15c2.695 0 5.207.795 7.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            <span>{{ $artikel->penulis }}</span>
        </div>

        {{-- TANGGAL --}}
        <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            <span>{{ \Carbon\Carbon::parse($artikel->tanggal_publikasi)->translatedFormat('d F Y') }}</span>
        </div>

        {{-- WAKTU BACA --}}
        <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                      d="M12 6v6l4 2M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"/>
            </svg>
            <span>{{ $artikel->waktu_baca }} menit baca</span>
        </div>
    </div>
</div>

{{-- ================= THUMBNAIL ================= --}}
<div class="px-6 md:px-20 lg:px-52 animate-[fadeUp_1s_ease-out]">
    <div class="max-w-4xl mx-auto">
        <div class="rounded-3xl overflow-hidden border border-gray-100
                    bg-gradient-to-br from-green-50 to-blue-50
                    flex items-center justify-center min-h-[320px]">

            @if($artikel->thumbnail)
                <img
                    src="{{ asset('storage/' . $artikel->thumbnail) }}"
                    class="w-full h-full object-cover"
                    alt="{{ $artikel->judul }}">
            @else
                <span class="text-gray-400 text-sm">Thumbnail Artikel</span>
            @endif
        </div>
    </div>
</div>

{{-- ================= ISI ARTIKEL ================= --}}
<div class="px-6 md:px-14 lg:px-24 mt-12 pb-20">
    <div class="max-w-4xl mx-auto text-gray-700 leading-relaxed article-content">

        {{-- INTRO --}}
        <p class="text-base md:text-xl font-bold text-gray-900 mb-6 animate-[fadeUp_1.2s_ease-out]">
            {{ $artikel->intro }}
        </p>

        {{-- HIGHLIGHT --}}
        <div class="highlight-box flex items-start gap-3 animate-[fadeUp_1.25s_ease-out]">

            {{-- ICON (SVG) --}}
            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-6 text-green-600 mt-0.5 flex-shrink-0"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z"/>
            </svg>

            {{-- TEXT --}}
            <p class="text-green-800 leading-relaxed">
                <strong class="font-semibold">Tahukah Anda?</strong><br>
                Stunting dapat dicegah dengan intervensi nutrisi yang tepat sejak
                <strong>1000 hari pertama kehidupan</strong>.
            </p>
        </div>

        {{-- KONTEN --}}
        <div class="space-y-6 text-base md:text-lg animate-[fadeUp_1.3s_ease-out]">
            {!! $artikel->konten !!}
        </div>
    </div>
</div>

{{-- ================= ARTIKEL TERKAIT ================= --}}
<div class="px-6 md:px-20 lg:px-52 mb-20">

    <h2
        class="text-2xl md:text-3xl font-bold text-center mb-10
               animate-[fadeUp_1.4s_ease-out]">
        Artikel Terkait
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        @forelse ($relatedArticles ?? [] as $related)
            <a href="{{ route('user.edukasi.detail', $related->slug) }}"
               class="block bg-white border border-gray-200 rounded-2xl p-6
                      hover:shadow-lg transition
                      animate-[fadeUp_1.5s_ease-out]">

                <h3 class="font-semibold text-lg leading-snug">
                    {{ $related->judul }}
                </h3>

                <p class="text-gray-500 text-sm mt-2">
                    {{ $related->waktu_baca }} menit baca
                </p>
            </a>

        @empty
            @foreach ([
                ['judul' => '1000 Hari Pertama Kehidupan: Periode Emas Tumbuh Kembang', 'baca' => '7 menit baca'],
                ['judul' => 'Makanan Bergizi untuk Mencegah Stunting', 'baca' => '4 menit baca'],
                ['judul' => 'Peran ASI Eksklusif dalam Mencegah Stunting', 'baca' => '6 menit baca'],
            ] as $related)
                <div
                    class="bg-white border border-gray-200 rounded-2xl p-6
                           hover:shadow-lg transition
                           animate-[fadeUp_1.5s_ease-out]">

                    <h3 class="font-semibold text-lg leading-snug">
                        {{ $related['judul'] }}
                    </h3>

                    <p class="text-gray-500 text-sm mt-2">
                        {{ $related['baca'] }}
                    </p>
                </div>
            @endforeach
        @endforelse

    </div>
</div>

@endsection
