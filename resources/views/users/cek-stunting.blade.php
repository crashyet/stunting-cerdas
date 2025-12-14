@extends('layouts.user-layout')

@section('content')

{{-- ====== HERO ======= --}}
<section class="bg-gradient-to-b from-[#E6F5EC] via-[#ECF5F1] to-[#F8FBFF] pt-10 pb-14 border-a animate-[fadeUp_.6s_ease-out]">
    <div class="px-6 md:px-10 lg:px-14">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 bg-green-100 rounded-2xl flex items-center justify-center shadow-sm animate-[fadeUp_.8s_ease-out]">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-8 h-8 text-green-600"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900 leading-tight
                       animate-[fadeUp_.9s_ease-out]">
                Cek <span class="text-green-600">Stunting</span>
            </h1>
        </div>

        <p class="text-gray-600 mt-3 max-w-2xl text-sm md:text-base leading-relaxed
                  animate-[fadeUp_1s_ease-out]">
            Hitung Z-score anak berdasarkan standar WHO untuk mengetahui status pertumbuhan.
        </p>
    </div>
</section>

{{-- ======= MAIN WRAPPER ======= --}}
<div class="container mx-auto px-10 md:px-14 mt-10 pb-24">
    <div class="grid md:grid-cols-2 gap-10 items-start">

        {{-- ===== KOLOM KIRI ===== --}}
        <div class="flex flex-col gap-8">

            {{-- ----- FORM ----- --}}
            <div class="p-8 bg-white rounded-3xl shadow-sm border animate-[fadeUp_1s_ease-out]">
                <h2 class="text-xl font-semibold mb-1 flex items-center gap-2 animate-[fadeUp_1.1s_ease-out]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-600" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>

                <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900 leading-tight tracking-tight">
                    Cek <span class="text-green-600">Stunting</span>
                </h1>
            </div>

            <p class="text-gray-600 mt-3 max-w-2xl text-sm md:text-base leading-relaxed animate-[fadeUp_.9s_ease-out]">
                Hitung Z-score anak berdasarkan standar WHO untuk mengetahui status pertumbuhan.
            </p>

        </div>
    </section>



    {{-- ========================== MAIN WRAPPER ========================== --}}
    <div class="container mx-auto px-10 md:px-14 mt-10 pb-24">

        <div class="grid md:grid-cols-2 gap-10 items-start">

            {{-- ===================== KOLOM KIRI ===================== --}}
            <div class="flex flex-col gap-8">

                {{-- ---------- FORM ---------- --}}
                <div class="p-8 bg-white rounded-3xl shadow-sm border animate-[fadeUp_1s_ease-out]">
                    <h2 class="text-xl font-semibold mb-1 flex items-center gap-2 animate-[fadeUp_1.1s_ease-out]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-3-3v6m9-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Form Pemeriksaan
                    </h2>

                    <p class="text-gray-500 text-sm mb-6 animate-[fadeUp_1.2s_ease-out]">
                        Masukkan data anak untuk menghitung status pertumbuhan.
                    </p>

                    <form class="animate-[fadeUp_1.3s_ease-out]">
                        <label class="text-sm font-medium">Nama Anak</label>
                        <select name="anak_id"
                            class="w-full px-4 py-3 border rounded-xl mb-4 focus:ring focus:ring-green-200" required>
                            <option value="">-- Pilih Anak --</option>

                            @foreach ($anak as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>


                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="text-sm font-medium">Umur (bulan)</label>
                                <input type="number"
                                    class="w-full px-4 py-3 border rounded-xl focus:ring focus:ring-green-200"
                                    value="24">
                            </div>

                            <div>
                                <label class="text-sm font-medium">Jenis Kelamin</label>
                                <select class="w-full px-4 py-3 border rounded-xl focus:ring focus:ring-green-200">
                                    <option>Pilih</option>
                                    <option>Laki-laki</option>
                                    <option>Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="text-sm font-medium">Tinggi Badan (cm)</label>
                                <input type="number"
                                    class="w-full px-4 py-3 border rounded-xl focus:ring focus:ring-green-200"
                                    value="85">
                            </div>

                            <div>
                                <label class="text-sm font-medium">Berat Badan (kg)</label>
                                <input type="number"
                                    class="w-full px-4 py-3 border rounded-xl focus:ring focus:ring-green-200"
                                    value="12">
                            </div>
                        </div>

                        <button type="button"
                            class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-4 rounded-xl transition">
                            Hitung Z-Score
                        </button>
                    </form>
                </div>

                {{-- ---------- INFO BOX ---------- --}}
                <div class="p-4 bg-blue-50 border border-blue-100 rounded-xl text-sm animate-[fadeUp_1.4s_ease-out]">
                    <p class="font-semibold text-blue-800 mb-1 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
                        </svg>
                        Tentang Z-Score
                    </p>

                    <p class="text-blue-700 leading-relaxed">
                        Z-score adalah ukuran standar WHO yang membandingkan tinggi/berat anak
                        dengan rata-rata anak seusianya. Nilai <strong>di bawah -2</strong> menunjukkan stunting.
                    </p>
                </div>

            </div>
        </div>

        {{-- ======== KOLOM KANAN ======== --}}
        <div class="p-8 bg-white rounded-3xl shadow-sm border
                    flex flex-col justify-center items-center text-center h-full
                    animate-[fadeUp_1.5s_ease-out]">

                <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-gray-400 mb-4" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>

                <h3 class="text-gray-600 font-medium text-lg">Hasil Akan Tampil Di Sini</h3>

            <p class="text-gray-400 text-sm mt-1 leading-relaxed">
                Isi form di samping untuk menghitung status pertumbuhan anak
            </p>
        </div>
    </div>
</div>

{{-- ========== FADE UP KEYFRAME ========== --}}
<style>
@keyframes fadeUp {
    0% { opacity: 0; transform: translateY(14px); }
    100% { opacity: 1; transform: translateY(0); }
}
</style>

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endsection
