@extends('layouts.landing-layout')

@section('content')

{{-- ========================= HERO SECTION ========================= --}}
<section id="beranda" class="relative overflow-hidden min-h-screen flex items-center pt-40 pb-28">

    {{-- Elegant gradient --}}
    <div class="absolute inset-0 bg-gradient-to-br from-green-50 via-white to-blue-50"></div>

    {{-- Soft Blurred Orbs --}}
    <div class="absolute -top-28 -left-24 w-96 h-96 bg-green-300/20 blur-[130px] rounded-full"></div>
    <div class="absolute top-10 -right-40 w-[460px] h-[460px] bg-blue-300/20 blur-[160px] rounded-full"></div>

    {{-- HERO CONTENT WRAPPER --}}
    <<div class="relative w-full max-w-6xl mx-auto px-6 text-center scroll-hero">

        {{-- Badge --}}
        <div class="inline-block bg-white/70 backdrop-blur-md text-green-700 px-6 py-2 rounded-full 
                    text-sm font-medium border border-green-100 shadow-sm mb-8">
            Platform Pencegahan Stunting #1 di Indonesia
        </div>

        {{-- Title --}}
        <h1 class="text-4xl md:text-6xl font-extrabold leading-tight text-gray-900 tracking-tight">
            Wujudkan 
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-blue-500">
                Generasi Sehat
            </span>
            Bebas <br>
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-blue-500">
                Stunting
            </span>
        </h1>

        {{-- Subtitle --}}
        <p class="mt-6 text-lg md:text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
            Pantau tumbuh kembang anak, dapatkan rekomendasi gizi tepat,
            dan akses edukasi lengkap untuk mencegah stunting sejak dini.
        </p>

        {{-- CTA Buttons --}}
        <div class="mt-10 flex justify-center gap-4 flex-wrap">
            
            <a href="/cek-stunting"
                class="px-8 py-4 bg-green-600 text-white rounded-full font-semibold shadow-md 
                       hover:shadow-xl hover:bg-green-700 active:scale-95 transition">
                Cek Stunting Sekarang →
            </a>

            <a href="#fitur"
                class="px-8 py-4 border border-green-600 text-green-700 rounded-full font-semibold 
                       hover:bg-green-50 active:scale-95 transition">
                Pelajari Lebih Lanjut
            </a>
        </div>

        {{-- Statistik --}}
        <div class="mt-16 w-full px-6 md:px-20 grid grid-cols-2 md:grid-cols-4 gap-y-6 gap-x-2 text-center">

            @foreach ([
                ['10K+', 'Anak Terpantau'],
                ['500+', 'Artikel Edukasi'],
                ['95%', 'Akurasi Z-Score'],
                ['24/7', 'Monitoring'],
            ] as $item)
                <div class="transition hover:scale-105">
                    <h3 class="text-3xl font-bold text-green-700">{{ $item[0] }}</h3>
                    <p class="text-gray-600 text-sm mt-1">{{ $item[1] }}</p>
                </div>
            @endforeach

        </div>

    </div>
</section>

{{-- ========================= FITUR SECTION ========================= --}}
<section id="fitur" class="py-24 px-6 bg-gradient-to-b from-white to-[#f3f7ff]">

    <div class="container mx-auto max-w-6xl">

        <h2 class="text-center text-4xl font-extrabold text-gray-900 mb-3 scroll-fade">
            Fitur <span class="text-green-600">Unggulan</span>
        </h2>

        <p class="text-center text-gray-600 mb-14 max-w-xl mx-auto scroll-fade">
            Platform lengkap yang dirancang untuk mendukung perjalanan kesehatan anak Anda, 
            dengan informasi terpercaya dan pemantauan yang mudah digunakan.
        </p>

        @php
            $fitur = [
                ['icon' => '📏', 'title' => 'Cek Stunting', 'desc' => 'Hitung Z-score berbasis standar WHO.'],
                ['icon' => '📘', 'title' => 'Edukasi Lengkap', 'desc' => 'Materi terpercaya seputar pencegahan stunting.'],
                ['icon' => '🥗', 'title' => 'Rekomendasi Makanan', 'desc' => 'Menu seimbang sesuai kebutuhan anak.'],
                ['icon' => '💙', 'title' => 'Cek Gizi Harian', 'desc' => 'Pantau kebutuhan nutrisi harian anak.'],
                ['icon' => '👨‍👩‍👧', 'title' => 'Kelola Data Anak', 'desc' => 'Data anak tersimpan aman & terstruktur.'],
                ['icon' => '📊', 'title' => 'Dashboard Monitoring', 'desc' => 'Grafik perkembangan lengkap & real-time.'],
            ];
        @endphp

        <div class="grid md:grid-cols-3 gap-8">

            @foreach ($fitur as $item)
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100
                        px-7 py-6 transition-all hover:-translate-y-1 hover:shadow-xl scroll-fade">

                {{-- ICON BOX --}}
                <div class="w-14 h-14 bg-green-100 rounded-2xl flex items-center justify-center shadow-sm mb-4">

                    @switch($item['icon'])

                        @case('📏')
                            {{-- Ruler --}}
                            <svg class="w-8 h-8 text-green-600" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 8l7-5 7 5v8l-7 5-7-5V8z" />
                            </svg>
                        @break

                        @case('📘')
                            {{-- Book --}}
                            <svg class="w-8 h-8 text-blue-600" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    d="M4 5a2 2 0 012-2h10a2 2 0 012 2v13a2 2 0 01-2 2H6a2 2 0 01-2-2V5z"/>
                            </svg>
                        @break

                        @case('🥗')
                            {{-- Food --}}
                            <svg class="w-8 h-8 text-orange-500" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    d="M4 10h16M5 10c-.5 3.5 2 7 7 7s7.5-3.5 7-7"/>
                            </svg>
                        @break

                        @case('💙')
                            {{-- Heart --}}
                            <svg class="w-8 h-8 text-red-500" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 21s-6.5-4-9-9c-2-4 1-8 5-8a5 5 0 014 2 5 5 0 014-2c4 0 7 4 5 8-2.5 5-9 9-9 9z"/>
                            </svg>
                        @break

                        @case('👨‍👩‍👧')
                            {{-- Family --}}
                            <svg class="w-8 h-8 text-purple-600" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <circle cx="7" cy="7" r="3" stroke-width="2"/>
                                <circle cx="17" cy="7" r="3" stroke-width="2"/>
                                <path stroke-width="2" d="M2 21v-1a5 5 0 015-5h3a5 5 0 015 5v1"/>
                                <path stroke-width="2" d="M14 21v-1a5 5 0 015-5h1"/>
                            </svg>
                        @break

                        @case('📊')
                            {{-- Chart --}}
                            <svg class="w-8 h-8 text-blue-600" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    d="M4 20h16M6 16l3-3 3 3 4-6"/>
                            </svg>
                        @break

                    @endswitch

                </div>

                {{-- TITLE --}}
                <h3 class="font-semibold text-lg text-gray-900 mb-1">
                    {{ $item['title'] }}
                </h3>

                {{-- DESCRIPTION --}}
                <p class="text-gray-600 text-[15px] leading-relaxed">
                    {{ $item['desc'] }}
                </p>
            </div>
            @endforeach

        </div>
    </div>

</section>

{{-- ========================= TENTANG KAMI ========================= --}}
<section id="tentang" class="py-28 px-6 bg-gradient-to-br from-purple-50 via-blue-50 to-cyan-50">
    <div class="container mx-auto max-w-5xl text-center">

        <h2 class="text-4xl font-extrabold text-gray-900 mb-4 scroll-fade">
            Tentang <span class="text-green-600">Kami</span>
        </h2>

        <p class="text-center text-gray-600 mb-14 max-w-xl mx-auto scroll-fade"> 
            Cegah Stunting adalah platform digital berbasis data dan edukasi yang bertujuan membantu orang tua 
            memantau pertumbuhan anak, memahami risiko stunting, dan mengambil langkah pencegahan sejak dini.
        </p>

        <div class="grid md:grid-cols-3 gap-10 mt-16">

            {{-- CARD 1 --}}
            <div class="p-8 rounded-2xl bg-white/60 backdrop-blur shadow-md border border-gray-100 
                        hover:shadow-xl transition-all hover:-translate-y-1 scroll-fade">
                <div class="w-14 h-14 mx-auto mb-4 flex items-center justify-center 
                            bg-blue-100 rounded-full">
                    <svg class="w-8 h-8 text-blue-600" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <circle cx="12" cy="7" r="3" stroke-width="2"/>
                        <path stroke-width="2" d="M5 21v-1a7 7 0 0114 0v1"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-xl text-gray-800 mb-2">Edukasi Terpercaya</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Materi edukasi berdasarkan standar WHO dan riset terkini.
                </p>
            </div>

            {{-- CARD 2 --}}
            <div class="p-8 rounded-2xl bg-white/60 backdrop-blur shadow-md border border-gray-100 
                        hover:shadow-xl transition-all hover:-translate-y-1 scroll-fade">
                <div class="w-14 h-14 mx-auto mb-4 flex items-center justify-center 
                            bg-purple-100 rounded-full">
                    <svg class="w-8 h-8 text-purple-600" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-width="2" d="M4 20h16M6 16h2m2-4h2m2-3h2"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-xl text-gray-800 mb-2">Data Akurat WHO</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Menggunakan data tinggi badan dan perkembangan anak berbasis standar internasional.
                </p>
            </div>

            {{-- CARD 3 --}}
            <div class="p-8 rounded-2xl bg-white/60 backdrop-blur shadow-md border border-gray-100 
                        hover:shadow-xl transition-all hover:-translate-y-1 scroll-fade">
                <div class="w-14 h-14 mx-auto mb-4 flex items-center justify-center 
                            bg-green-100 rounded-full">
                    <svg class="w-8 h-8 text-green-600" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-width="2" d="M4 12l4 4 6-6 6 6"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-xl text-gray-800 mb-2">Kolaborasi Tenaga Medis</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Divalidasi oleh tenaga kesehatan untuk memastikan keakuratan informasi.
                </p>
            </div>

        </div>

    </div>
</section>

{{-- ========================= TUJUAN ========================= --}}
<section id="tujuan" class="py-28 px-6 bg-gradient-to-t from-white to-blue-50">
    <div class="container mx-auto max-w-6xl">

        <h2 class="text-center text-4xl font-extrabold text-gray-900 mb-4 scroll-fade">
            Tujuan <span class="text-green-600">Kami</span>
        </h2>

        <p class="text-center text-gray-600 mb-14 max-w-xl mx-auto scroll-fade">
            Bersama membantu orang tua membangun masa depan anak yang lebih sehat melalui edukasi, data, dan pemantauan yang mudah.
        </p>

        <div class="grid md:grid-cols-3 gap-10">

            {{-- CARD 1 — Pencegahan Stunting --}}
            <div class="p-8 bg-white rounded-3xl border border-gray-100 shadow-md
                        hover:shadow-xl transition-all hover:-translate-y-1 scroll-fade">
                <div class="w-14 h-14 flex items-center justify-center rounded-full bg-blue-100 mb-5">

                    {{-- ICON: SHIELD CHECK --}}
                    <svg class="w-7 h-7 text-blue-600" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M12 3l7 4v5c0 5-3.5 9-7 9s-7-4-7-9V7l7-4z" />
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M9 12l2 2 4-4" />
                    </svg>

                </div>

                <h3 class="font-bold text-xl text-gray-800 mb-3">Pencegahan Stunting</h3>
                <p class="text-gray-600 leading-relaxed">
                    Membantu orang tua mendeteksi risiko stunting sejak usia dini.
                </p>
            </div>

            {{-- CARD 2 — Edukasi Nasional --}}
            <div class="p-8 bg-white rounded-3xl border border-gray-100 shadow-md
                        hover:shadow-xl transition-all hover:-translate-y-1 scroll-fade">
                <div class="w-14 h-14 flex items-center justify-center rounded-full bg-purple-100 mb-5">

                    {{-- ICON: LIGHT BULB / IDEA --}}
                    <svg class="w-7 h-7 text-purple-600" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M12 3a6 6 0 016 6c0 2.2-1.2 3.5-2.3 4.5A4 4 0 0114 17v1H10v-1a4 4 0 01-1.7-3.5C7.2 12.5 6 11.2 6 9a6 6 0 016-6z" />
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M10 21h4" />
                    </svg>

                </div>

                <h3 class="font-bold text-xl text-gray-800 mb-3">Edukasi Nasional</h3>
                <p class="text-gray-600 leading-relaxed">
                    Memberikan informasi terpercaya dan mudah dipahami masyarakat.
                </p>
            </div>

            {{-- CARD 3 — Monitoring Real-Time --}}
            <div class="p-8 bg-white rounded-3xl border border-gray-100 shadow-md
                        hover:shadow-xl transition-all hover:-translate-y-1 scroll-fade">
                <div class="w-14 h-14 flex items-center justify-center rounded-full bg-green-100 mb-5">

                    {{-- ICON: CHART TREND --}}
                    <svg class="w-7 h-7 text-green-600" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M4 20h16" />
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M6 16l4-4 3 3 5-7" />
                    </svg>

                </div>

                <h3 class="font-bold text-xl text-gray-800 mb-3">Monitoring Real-Time</h3>
                <p class="text-gray-600 leading-relaxed">
                    Memantau grafik perkembangan anak dalam satu dashboard lengkap.
                </p>
            </div>

        </div>
    </div>
</section> 

{{-- ========================= EDUKASI ========================= --}}
<section id="edukasi" class="py-28 px-6 bg-gradient-to-t from-white to-blue-50">
    <div class="container mx-auto max-w-6xl">

        <h2 class="text-center text-4xl font-extrabold text-gray-900 mb-4 scroll-fade">
            Edukasi <span class="text-green-600">Stunting</span>
        </h2>

        <p class="text-center text-gray-600 mb-14 max-w-xl mx-auto scroll-fade">
            Membantu membangun masa depan anak yang lebih sehat melalui edukasi yang terpercaya, 
            pemantauan perkembangan, dan dukungan berkelanjutan.
        </p>

        <div class="grid md:grid-cols-3 gap-10">

            <!-- CARD 1 -->
            <div data-modal="modal-1"
                 class="edukasi-card p-8 bg-white rounded-3xl border border-gray-100 shadow-md
                        hover:shadow-xl transition-all hover:-translate-y-1 scroll-fade cursor-pointer">
                <div class="w-14 h-14 flex items-center justify-center rounded-full bg-blue-100 mb-5">
                    <svg class="w-7 h-7 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M4 6a2 2 0 012-2h11a2 2 0 012 2v13H6a2 2 0 01-2-2z"/>
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M6 4v13"/>
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M9 12l2 2 4-4"/>
                    </svg>
                </div>
                <h3 class="font-bold text-xl text-gray-800 mb-3">Pencegahan Stunting</h3>
                <p class="text-gray-600 leading-relaxed">
                    Membantu orang tua mendeteksi risiko stunting sejak usia dini.
                </p>
            </div>

            <!-- CARD 2 -->
            <div data-modal="modal-2"
                 class="edukasi-card p-8 bg-white rounded-3xl border border-gray-100 shadow-md
                        hover:shadow-xl transition-all hover:-translate-y-1 scroll-fade cursor-pointer">
                <div class="w-14 h-14 flex items-center justify-center rounded-full bg-purple-100 mb-5">
                    <svg class="w-7 h-7 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M12 3l9 4.5-9 4.5-9-4.5L12 3z"/>
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M21 10v5a9 9 0 01-18 0v-5"/>
                    </svg>
                </div>
                <h3 class="font-bold text-xl text-gray-800 mb-3">1000 Hari Pertama Kehidupan</h3>
                <p class="text-gray-600 leading-relaxed">
                     periode emas krusial untuk mencegah stunting.
                </p>
            </div>

            <!-- CARD 3 -->
            <div data-modal="modal-3"
                 class="edukasi-card p-8 bg-white rounded-3xl border border-gray-100 shadow-md
                        hover:shadow-xl transition-all hover:-translate-y-1 scroll-fade cursor-pointer">
                <div class="w-14 h-14 flex items-center justify-center rounded-full bg-green-100 mb-5">
                    <svg class="w-7 h-7 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M4 6a2 2 0 012-2h11a2 2 0 012 2v13H6a2 2 0 01-2-2z"/>
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M6 4v13"/>
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M9 15l3-3 3 2 4-5"/>
                    </svg>
                </div>
                <h3 class="font-bold text-xl text-gray-800 mb-3">apa itu stunting?</h3>
                <p class="text-gray-600 leading-relaxed">
                   Stunting adalah gagal tumbuh akibat kekurangan gizi jangka panjang.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- ================= MODAL ================= -->
<div id="modal-overlay" class="modal-overlay hidden">
    <div class="modal-box">
        <button class="modal-close">&times;</button>
        <h3 id="modal-title"></h3>
        <p id="modal-content"></p>
    </div>
</div>

<!-- ================= CSS ================= -->
<style>
.modal-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,.35);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 999;
}
.modal-overlay.hidden { display: none; }

/* BLUR KHUSUS DESKTOP */
@media (min-width: 1024px) {
    .modal-overlay {
        backdrop-filter: blur(6px);
        -webkit-backdrop-filter: blur(6px);
    }
}

.modal-box {
    background: #fff;
    max-width: 500px;
    width: 90%;

    max-height: 75vh;          
    overflow-y: auto;          

    border-radius: 20px;
    padding: 24px;
    position: relative;

    animation: modalFade .25s ease;
}

@keyframes modalFade {
    from { opacity: 0; transform: translateY(10px); }
    to   { opacity: 1; transform: translateY(0); }
}
.modal-box h3 {
    font-size: 20px;
    font-weight: 700;
    margin-bottom: 12px;
    color: #111827;
}
.modal-box p {
    font-size: 14px;
    color: #4b5563;
    line-height: 1.6;
}
.modal-close {
    position: absolute;
    top: 12px;
    right: 14px;
    background: none;
    border: none;
    font-size: 22px;
    cursor: pointer;
    color: #6b7280;
}

/* KUNCI SCROLL */
body.modal-open {
    overflow: hidden;
}
</style>

<!-- ================= JS ================= -->
<script>
const modalData = {
    "modal-1": {
        title: "Pencegahan Stunting",
        content: "Pencegahan stunting fokus pada 1000 Hari Pertama Kehidupan (dari kehamilan hingga anak usia 2 tahun) dengan memastikan gizi ibu hamil, ASI eksklusif 6 bulan, MPASI kaya protein hewani, imunisasi lengkap, serta menjaga kebersihan lingkungan dan kesehatan anak secara rutin. Pencegahan juga melibatkan edukasi remaja putri (mencegah anemia dan pernikahan dini) dan perbaikan sanitasi."
    },
    "modal-2": {
        title: "1000 Hari Pertama Kehidupan (HPK)",
        content: "1000 Hari Pertama Kehidupan (HPK), dari dalam kandungan hingga anak usia 2 tahun, adalah periode emas krusial untuk mencegah stunting, yaitu gagal tumbuh akibat kekurangan gizi kronis dan infeksi berulang; kekurangan gizi di masa ini bisa menyebabkan gangguan permanen pada pertumbuhan fisik dan perkembangan otak, sehingga asupan nutrisi ibu hamil dan anak (ASI eksklusif, MPASI berkualitas) serta pemantauan rutin sangat vital untuk masa depan anak."
    },
    "modal-3": {
        title: "apa itu stunting?",
        content: "Stunting adalah kondisi gagal tumbuh pada anak akibat kekurangan gizi kronis (dalam jangka panjang), yang ditandai dengan tinggi badan lebih pendek dari standar usianya, dan dapat menghambat perkembangan fisik, kognitif (kecerdasan), serta meningkatkan risiko penyakit di masa depan. Ini terjadi karena asupan gizi yang tidak mencukupi sejak ibu hamil hingga anak berusia di bawah 5 tahun, termasuk infeksi berulang."
    }
};

const overlay = document.getElementById("modal-overlay");
const titleEl = document.getElementById("modal-title");
const contentEl = document.getElementById("modal-content");

document.querySelectorAll(".edukasi-card").forEach(card => {
    card.addEventListener("click", () => {
        const key = card.dataset.modal;
        titleEl.textContent = modalData[key].title;
        contentEl.textContent = modalData[key].content;

        overlay.classList.remove("hidden");
        document.body.classList.add("modal-open");
    });
});

document.querySelector(".modal-close").onclick = () => {
    overlay.classList.add("hidden");
    document.body.classList.remove("modal-open");
};

overlay.onclick = e => {
    if (e.target === overlay) {
        overlay.classList.add("hidden");
        document.body.classList.remove("modal-open");
    }
};
</script>

{{-- Smooth Scroll --}}
<script>
    document.querySelectorAll('a[href^="#"]').forEach(link => {
        link.addEventListener("click", function(e) {
            e.preventDefault();
            document.querySelector(this.getAttribute("href")).scrollIntoView({
                behavior: "smooth",
                block: "start"
            });
        });
    });
</script>

{{-- ANIMASI --}}
<style>
    .scroll-hero {
        opacity: 0;
        transform: scale(0.85);
        filter: blur(18px);
        transform-origin: center;
        transition: all .9s cubic-bezier(.16, .8, .32, 1);
    }
    .scroll-hero.visible {
        opacity: 1;
        transform: scale(1);
        filter: blur(0);
    }
    .scroll-fade {
        opacity: 0;
        transform: translateY(26px);
        transition: all .8s ease-out;
    }
    .scroll-fade.visible {
        opacity: 1;
        transform: translateY(0);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const hero = document.querySelector('.scroll-hero');

        if (hero) {
            requestAnimationFrame(() => {
                hero.classList.add('visible');
            });
        }

        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) entry.target.classList.add("visible");
                else entry.target.classList.remove("visible");
            });
        }, { threshold: 0.25 });

        document.querySelectorAll(".scroll-hero, .scroll-fade")
            .forEach(el => observer.observe(el));
    });
</script>

@endsection
