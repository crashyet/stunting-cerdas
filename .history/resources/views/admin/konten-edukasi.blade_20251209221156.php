@extends('layouts.admin-layout')

@section('title', 'Konten Edukasi')

@section('sidebar')
    @include('components.sidebar')
@endsection

@section('content')

{{-- PAGE WRAPPER --}}
<div x-data="{ openAddArticle: false }" class="flex flex-col animate-[fadeUp_.5s_ease-out]">

    {{-- TITLE --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Manajemen Konten Edukasi</h1>
        <p class="text-gray-500 mt-1">Kelola artikel dan konten edukasi stunting</p>
    </div>

    {{-- SEARCH BAR --}}
    <div class="bg-white rounded-xl border shadow-sm px-5 py-4 flex items-center gap-3 mb-8">
        <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
        <input type="text"
               placeholder="Cari artikel..."
               class="w-full text-gray-700 focus:outline-none">
    </div>

    {{-- HEADER + BUTTON --}}
    <div  class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold text-gray-800 flex items-center gap-2">
            <i class="fa-solid fa-book-open-reader text-green-600"></i>
            Daftar Artikel (6)
        </h2>

        <button 
    @click="openAddArticle = true"
    class="px-5 py-2 bg-green-600 hover:bg-green-700 text-white rounded-xl shadow flex items-center gap-2 transition">
    <i class="fa-solid fa-plus"></i> Tambah Artikel
</button>
    </div>

    {{-- TABLE --}}
    <div class="bg-white border rounded-xl shadow-sm overflow-hidden">

        <table class="w-full text-left">
            <thead class="bg-gray-50 border-b text-gray-600 text-sm">
                <tr>
                    <th class="py-3 px-5 font-medium">Judul</th>
                    <th class="py-3 px-5 font-medium">Kategori</th>
                    <th class="py-3 px-5 font-medium">Penulis</th>
                    <th class="py-3 px-5 font-medium">Tanggal</th>
                    <th class="py-3 px-5 font-medium w-20">Aksi</th>
                </tr>
            </thead>

            <tbody class="text-gray-800">

                {{-- ROW 1 --}}
                <tr class="border-b hover:bg-gray-50 transition animate-[fadeUp_.6s_ease-out]">
                    <td class="py-4 px-5">Mengenal Stunting: Penyebab dan Cara Pencegahannya</td>
                    <td class="px-5">
                        <span class="px-3 py-1 text-xs bg-green-100 text-green-700 rounded-full">Edukasi</span>
                    </td>
                    <td class="px-5">Dr. Sari Pediatri</td>
                    <td class="px-5">15/1/2024</td>
                    <td class="px-5 flex gap-3">
                        <button class="text-gray-600 hover:text-gray-900 transition"><i class="fa-solid fa-pen"></i></button>
                        <button class="text-red-500 hover:text-red-700 transition"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>

            </tbody>
        </table>

    </div>
    <!-- POPUP TAMBAH ARTIKEL -->
<div 
    x-show="openAddArticle"
    x-transition
    @keydown.escape.window="openAddArticle = false"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm">

    <div 
        x-transition
        class="bg-white max-w-2xl w-full max-h-[90vh] overflow-y-auto p-6 rounded-lg shadow-lg">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold">Tambah Artikel Baru</h2>
            <button @click="openAddArticle = false" class="text-gray-500 hover:text-gray-700">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <!-- FORM -->
        <form class="space-y-4">

            <div>
                <label class="text-sm font-medium">Judul Artikel</label>
                <input type="text"
                       class="w-full rounded-md border px-3 py-2 mt-1"
                       required>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-sm font-medium">Kategori</label>
                    <select
                        class="w-full mt-1 rounded-md border px-3 py-2">
                        <option>Edukasi</option>
                        <option>Panduan</option>
                        <option>Nutrisi</option>
                        <option>Kesehatan</option>
                    </select>
                </div>

                <div>
                    <label class="text-sm font-medium">Waktu Baca (menit)</label>
                    <input type="number" min="1"
                        class="w-full mt-1 rounded-md border px-3 py-2"
                        required>
                </div>
            </div>

            <div>
                <label class="text-sm font-medium">Penulis</label>
                <input type="text"
                    class="w-full mt-1 rounded-md border px-3 py-2"
                    required>
            </div>

            <div>
                <label class="text-sm font-medium">Ringkasan</label>
                <textarea rows="2"
                    class="w-full mt-1 rounded-md border px-3 py-2"
                    required></textarea>
            </div>

            <div>
                <label class="text-sm font-medium">Konten Artikel</label>
                <textarea rows="6"
                    class="w-full mt-1 rounded-md border px-3 py-2"
                    required></textarea>
            </div>

            <button
                class="w-full py-2 bg-green-600 hover:bg-green-700 text-white rounded-xl shadow mt-4">
                Tambah Artikel
            </button>
        </form>
    </div>
</div>
</div>

{{-- TAILWIND CUSTOM ANIMATION --}}
<style>
@keyframes fadeUp {
    0% { opacity: 0; transform: translateY(12px); }
    100% { opacity: 1; transform: translateY(0px); }
}
</style>



@endsection
