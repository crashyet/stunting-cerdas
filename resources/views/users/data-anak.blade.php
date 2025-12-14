@extends('layouts.user-layout')

@section('content')
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<div 
    x-data="{ openAdd: false }"
    x-effect="document.body.classList.toggle('overflow-hidden', openAdd)"
>

{{-- ========================== HERO ========================== --}}
<section
    class="relative w-screen left-1/2 right-1/2 -ml-[50vw] -mr-[50vw]
    bg-gradient-to-b from-[#E6F5EC] via-[#ECF5F1] to-[#F8FBFF]
    pt-10 pb-12 md:pt-12 md:pb-14
    animate-[fadeUp_.5s_ease-out]"
>
    <div class="pl-6 md:pl-14 lg:pl-20 pr-6">

        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-green-100 rounded-2xl flex items-center justify-center shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-green-600" fill="none"
                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 12c2.2 0 4-1.8 4-4s-1.8-4-4-4-4 1.8-4 4 1.8 4 4 4zm-5 8c0-3 2.3-4 5-4s5 1 5 4v1H7v-1z" />
                </svg>
            </div>

            <h1 class="text-2xl md:text-3xl font-extrabold">
                Data <span class="text-green-600">Anak</span>
            </h1>
        </div>

        <p class="text-gray-600 mt-3 max-w-2xl">
            Kelola data anak Anda untuk pemantauan pertumbuhan yang lebih baik.
        </p>

    </div>
</section>

{{-- ========================== STICKY NAVBAR ========================== --}}
<div class="sticky top-20 z-40 bg-white/70 backdrop-blur-xl py-4 shadow-sm border-b">
    <div class="px-6 md:px-14 flex flex-col md:flex-row justify-between items-center gap-4">

        {{-- SEARCH --}}
        <div class="w-full md:w-1/3 flex items-center bg-white px-4 py-2 rounded-full shadow-sm border">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 21l-4.35-4.35M10 18a8 8 0 100-16 8 8 0 000 16z" />
            </svg>

            <input type="text" placeholder="Cari anak..."
                class="ml-3 w-full bg-transparent text-sm focus:outline-none">
        </div>

        {{-- BUTTON --}}
        <button
            @click="openAdd = true"
            class="px-6 py-2.5 bg-green-600 text-white rounded-full hover:bg-green-700 transition"
        >
            + Tambah Anak
        </button>

    </div>
</div>

{{-- ========================== MODAL TAMBAH ANAK (FIXED) ========================== --}}
<div
    x-cloak
    x-show="openAdd"
    x-transition.opacity
    @click.self="openAdd = false"
    class="fixed inset-0 z-[999] flex items-center justify-center bg-black/40"
>
    <div
        x-show="openAdd"
        x-transition.scale
        class="relative w-full max-w-md bg-white rounded-2xl p-6 shadow-xl"
    >
        {{-- CLOSE --}}
        <button
            @click="openAdd = false"
            class="absolute right-4 top-4 text-gray-500 hover:bg-gray-100 rounded-md p-1"
        >
            ✕
        </button>

        {{-- HEADER --}}
        <div class="mb-4">
            <h2 class="text-lg font-semibold">Tambah Anak Baru</h2>
            <p class="text-sm text-gray-500">
                Masukkan data anak untuk mulai pemantauan
            </p>
        </div>

        {{-- FORM --}}
        <form method="POST" action="{{ route('anak.store') }}" class="space-y-4">
            @csrf

            <div>
                <label class="text-sm font-medium">Nama Lengkap</label>
                <input name="nama" required
                    class="w-full rounded-md border px-3 py-2 focus:ring-2 focus:ring-green-500">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-sm font-medium">Umur (bulan)</label>
                    <input type="number" name="umur" required
                        class="w-full rounded-md border px-3 py-2 focus:ring-2 focus:ring-green-500">
                </div>

                <div>
                    <label class="text-sm font-medium">Jenis Kelamin</label>
                    <select name="jenis_kelamin" required
                        class="w-full rounded-md border px-3 py-2 focus:ring-2 focus:ring-green-500">
                        <option value="">Pilih</option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-sm font-medium">Tinggi (cm)</label>
                    <input type="number" step="0.1" name="tinggi_badan"
                        class="w-full rounded-md border px-3 py-2 focus:ring-2 focus:ring-green-500">
                </div>

                <div>
                    <label class="text-sm font-medium">Berat (kg)</label>
                    <input type="number" step="0.1" name="berat"
                        class="w-full rounded-md border px-3 py-2 focus:ring-2 focus:ring-green-500">
                </div>
            </div>

            <button
                class="w-full rounded-xl bg-green-600 py-3 text-white font-semibold hover:bg-green-700 transition"
            >
                Tambah Anak
            </button>
        </form>
    </div>
</div>

{{-- ========================== LIST DATA ANAK ========================== --}}
<div class="px-6 mt-10 pb-10 grid md:grid-cols-3 gap-6">
@foreach ([1,2,3] as $i)
    <div
        style="animation-duration: {{ 1.2 + $i * 0.1 }}s"
        class="rounded-3xl border bg-white shadow-sm p-5 animate-[fadeUp_ease-out]"
    >
        <h3 class="font-semibold">
            {{ $i == 1 ? 'Ahmad Rizki' : ($i == 2 ? 'Siti Aisyah' : 'Naufal Fikri') }}
        </h3>
        <p class="text-xs text-gray-500">
            {{ $i == 1 ? '3 tahun 9 bulan' : ($i == 2 ? '4 tahun 4 bulan' : '2 tahun 11 bulan') }}
        </p>
    </div>
@endforeach
</div>

{{-- ========================== STYLE ========================== --}}
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
