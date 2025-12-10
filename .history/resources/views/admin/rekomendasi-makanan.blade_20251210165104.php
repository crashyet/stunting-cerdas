@extends('layouts.admin-layout')

@section('title', 'Rekomendasi Makanan')

@section('sidebar')
    @include('components.sidebar')
@endsection

@section('content')

<div class="flex flex-col animate-[fadeUp_.5s_ease-out]">

    {{-- TITLE --}}
    <h1 class="text-3xl font-bold mb-2 animate-[fadeUp_.55s_ease-out]">Manajemen Rekomendasi Makanan</h1>
    <p class="text-gray-500 mb-8 animate-[fadeUp_.6s_ease-out]">Kelola daftar makanan bergizi untuk anak</p>

    {{-- SEARCH BAR --}}
    <div class="bg-white rounded-xl border px-5 py-4 flex items-center gap-3 mb-6 animate-[fadeUp_.65s_ease-out]">
        <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
        <input type="text" placeholder="Cari makanan..."
               class="w-full focus:outline-none text-gray-600">
    </div>

    {{-- HEADER + TAMBAH --}}
    <div class="flex justify-between items-center mb-4 animate-[fadeUp_.7s_ease-out]">
        <h2 class="text-xl font-semibold flex items-center gap-2">
            <i class="fa-solid fa-bowl-food text-green-600"></i>
            Daftar Makanan (6)
        </h2>



<button @click="openModal = true"
           class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg flex items-center gap-2">
            <i class="fa-solid fa-plus"></i> Tambah Makanan
        </a>
    </div>





    {{-- TABEL --}}
    <div class="bg-white border rounded-xl overflow-hidden animate-[fadeUp_.8s_ease-out]">
        <table class="w-full text-left">
            <thead class="bg-gray-100 border-b">
                <tr>
                    <th class="py-3 px-5">Nama</th>
                    <th class="py-3 px-5">Kategori</th>
                    <th class="py-3 px-5">Usia</th>
                    <th class="py-3 px-5">Kalori</th>
                    <th class="py-3 px-5">Protein</th>
                    <th class="py-3 px-5">Aksi</th>
                </tr>
            </thead>

            <tbody>

                {{-- ROW 1 --}}
                <tr class="border-b animate-[fadeUp_.85s_ease-out]">
                    <td class="py-4 px-5">Bubur Ayam Sayur</td>
                    <td class="px-5">MPASI</td>
                    <td class="px-5">6–12 bulan</td>
                    <td class="px-5">150</td>
                    <td class="px-5">8g</td>
                    <td class="px-5 flex gap-3">
                        <button class="text-gray-700 hover:text-black"><i class="fa-solid fa-pen"></i></button>
                        <button class="text-red-500 hover:text-red-700"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

</div>


{{-- CUSTOM ANIMATION --}}
<style>
@keyframes fadeUp {
    0% { opacity: 0; transform: translateY(12px); }
    100% { opacity: 1; transform: translateY(0); }
}
</style>

@endsection
