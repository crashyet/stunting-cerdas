@extends('layouts.landing-layout')

@section('content')

{{-- ========================= HERO SECTION ========================= --}}
<section id="beranda" class="relative overflow-hidden pt-40 pb-28">

    {{-- Elegant gradient --}}
    <div class="absolute inset-0 bg-gradient-to-br from-green-50 via-white to-blue-50"></div>

    {{-- Soft Blurred Orbs --}}
    <div class="absolute -top-28 -left-24 w-96 h-96 bg-green-300/20 blur-[130px] rounded-full"></div>
    <div class="absolute top-10 -right-40 w-[460px] h-[460px] bg-blue-300/20 blur-[160px] rounded-full"></div>

    {{-- HERO CONTENT WRAPPER (ANIMASI DARI DALAM KE LUAR) --}}
    <div class="relative max-w-6xl mx-auto px-6 text-center scroll-hero">

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
            Platform lengkap yang dirancang untuk mendukung perjalanan kesehatan anak Anda.
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
                <div class="w-14 h-14 flex items-center justify-center text-2xl
                            rounded-xl bg-gradient-to-br from-blue-100 to-purple-100
                            shadow-inner mb-4">
                    {{ $item['icon'] }}
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

        <p class="text-lg text-gray-600 max-w-3xl mx-auto leading-relaxed scroll-fade">
            StuntingCare adalah platform digital berbasis data dan edukasi yang bertujuan membantu orang tua 
            memantau pertumbuhan anak, memahami risiko stunting, dan mengambil langkah pencegahan sejak dini.
        </p>

        {{-- CARD LIST --}}
        <div class="grid md:grid-cols-3 gap-10 mt-16">

            <div class="p-8 rounded-2xl bg-white/60 backdrop-blur shadow-md border border-gray-100 
                        hover:shadow-xl transition-all hover:-translate-y-1 scroll-fade">
                <div class="w-14 h-14 mx-auto mb-4 flex items-center justify-center 
                            bg-blue-100 rounded-full text-2xl">
                    🚼
                </div>
                <h3 class="font-semibold text-xl text-gray-800 mb-2">Edukasi Terpercaya</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Materi edukasi berdasarkan standar WHO dan riset terkini.
                </p>
            </div>

            <div class="p-8 rounded-2xl bg-white/60 backdrop-blur shadow-md border border-gray-100 
                        hover:shadow-xl transition-all hover:-translate-y-1 scroll-fade">
                <div class="w-14 h-14 mx-auto mb-4 flex items-center justify-center 
                            bg-purple-100 rounded-full text-2xl">
                    📊
                </div>
                <h3 class="font-semibold text-xl text-gray-800 mb-2">Data Akurat WHO</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Menggunakan data tinggi badan dan perkembangan anak berbasis standar internasional.
                </p>
            </div>

            <div class="p-8 rounded-2xl bg-white/60 backdrop-blur shadow-md border border-gray-100 
                        hover:shadow-xl transition-all hover:-translate-y-1 scroll-fade">
                <div class="w-14 h-14 mx-auto mb-4 flex items-center justify-center 
                            bg-green-100 rounded-full text-2xl">
                    🤝
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

        <p class="text-center text-gray-600 max-w-2xl mx-auto mb-16 scroll-fade">
            Bersama membantu orang tua membangun masa depan anak yang lebih sehat melalui edukasi, data, dan pemantauan yang mudah.
        </p>

        <div class="grid md:grid-cols-3 gap-10">

            <div class="p-8 bg-white rounded-3xl border border-gray-100 shadow-md
                        hover:shadow-xl transition-all hover:-translate-y-1 scroll-fade">
                <div class="w-14 h-14 flex items-center justify-center rounded-full bg-blue-100 text-2xl mb-5">
                    📌
                </div>
                <h3 class="font-bold text-xl text-gray-800 mb-3">Pencegahan Stunting</h3>
                <p class="text-gray-600 leading-relaxed">
                    Membantu orang tua mendeteksi risiko stunting sejak usia dini.
                </p>
            </div>

            <div class="p-8 bg-white rounded-3xl border border-gray-100 shadow-md
                        hover:shadow-xl transition-all hover:-translate-y-1 scroll-fade">
                <div class="w-14 h-14 flex items-center justify-center rounded-full bg-purple-100 text-2xl mb-5">
                    📌
                </div>
                <h3 class="font-bold text-xl text-gray-800 mb-3">Edukasi Nasional</h3>
                <p class="text-gray-600 leading-relaxed">
                    Memberikan informasi terpercaya dan mudah dipahami masyarakat.
                </p>
            </div>

            <div class="p-8 bg-white rounded-3xl border border-gray-100 shadow-md
                        hover:shadow-xl transition-all hover:-translate-y-1 scroll-fade">
                <div class="w-14 h-14 flex items-center justify-center rounded-full bg-green-100 text-2xl mb-5">
                    📌
                </div>
                <h3 class="font-bold text-xl text-gray-800 mb-3">Monitoring Real-Time</h3>
                <p class="text-gray-600 leading-relaxed">
                    Memantau grafik perkembangan anak dalam satu dashboard lengkap.
                </p>
            </div>
        </div>
    </div>
</section>

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

{{-- ========== ANIMASI SCROLL (HERO INNER REVEAL + SECTION FADE UP, repeatable) ========== --}}
<style>
    /* HERO: muncul dari dalam ke luar (scale + blur + fade) */
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

    /* SECTION LAIN: fade-up */
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

        // Jalankan animasi hero saat pertama kali halaman selesai dimuat
        if (hero) {
            // sedikit delay biar transisinya kelihatan
            requestAnimationFrame(() => {
                hero.classList.add('visible');
            });
        }

        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                // Untuk hero dan section lain: animasi aktif tiap masuk viewport, hilang saat keluar
                if (entry.isIntersecting) {
                    entry.target.classList.add("visible");
                } else {
                    entry.target.classList.remove("visible");
                }
            });
        }, { threshold: 0.25 });

        document.querySelectorAll(".scroll-hero, .scroll-fade")
            .forEach(el => observer.observe(el));
    });
</script>

@endsection
