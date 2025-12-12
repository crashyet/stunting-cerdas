@extends('layouts.admin-layout')

@section('title', 'Rekomendasi Makanan')

@section('sidebar')
    @include('components.sidebar')
@endsection

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    {{-- WRAPPER ALPINE --}}
    <div x-data="{ openModal: false }" class="flex flex-col animate-[fadeUp_.5s_ease-out]">

        {{-- TITLE --}}
        <h1 class="text-3xl font-bold mb-2 animate-[fadeUp_.55s_ease-out]">Manajemen Rekomendasi Makanan</h1>
        <p class="text-gray-500 mb-8 animate-[fadeUp_.6s_ease-out]">Kelola daftar makanan bergizi untuk anak</p>

        {{-- SEARCH BAR --}}
        <div class="bg-white rounded-xl border px-5 py-4 flex items-center gap-3 mb-6 animate-[fadeUp_.65s_ease-out]">
            <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
            <input type="text" placeholder="Cari makanan..." class="w-full focus:outline-none text-gray-600">
        </div>

        {{-- HEADER + TAMBAH --}}
        <div class="flex justify-between items-center mb-4 animate-[fadeUp_.7s_ease-out]">
            <h2 class="text-xl font-semibold flex items-center gap-2">
                <i class="fa-solid fa-bowl-food text-green-600"></i>
                Daftar Makanan (6)
            </h2>

            {{-- BUTTON TAMBAH (Trigger Modal) --}}
            <button @click="openModal = true"
                class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg flex items-center gap-2">
                <i class="fa-solid fa-plus"></i> Tambah Makanan
            </button>
        </div>

        {{-- MODAL --}}
        <template x-if="openModal">
            <div class="fixed inset-0 z-50 flex items-center justify-center">

                {{-- BACKDROP --}}
                <div @click="openModal = false" class="absolute inset-0 bg-black/40 backdrop-blur-sm animate-fadeIn"></div>

                {{-- MODAL CARD --}}
                <div class="relative bg-white rounded-xl shadow-lg z-50 w-full max-w-2xl p-6 animate-scaleIn">

                    {{-- HEADER --}}
                    <div class="flex justify-between items-center mb-3">
                        <h2 class="text-lg font-semibold">Tambah Makanan Baru</h2>
                        <button @click="openModal = false" class="text-gray-500 hover:text-black">
                            <i class="fa-solid fa-xmark text-xl"></i>
                        </button>
                    </div>

                    {{-- FORM --}}
                    <form action="{{ route('admin.rekomendasi.store') }}" method="POST" class="space-y-4">
                        @csrf

                        {{-- Nama + Kategori --}}
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="text-sm font-medium">Nama Makanan</label>
                                <input name="judul" required
                                    class="w-full h-10 border rounded-md px-3 focus:ring-2 focus:ring-green-500">
                            </div>


                            <div>
                                <label class="text-sm font-medium">Kategori</label>
                                <input name="kategori" placeholder="MPASI, Sarapan..." required
                                    class="w-full h-10 border rounded-md px-3 focus:ring-2 focus:ring-green-500">
                            </div>
                        </div>

                        {{-- Usia & porsi --}}
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label class="text-sm font-medium">Rentang Usia</label>
                                <input name="usia" placeholder="6–12 bulan" required
                                    class="w-full h-10 border rounded-md px-3 focus:ring-2 focus:ring-green-500">
                            </div>
                            <div>
                                <label class="text-sm font-medium">Kalori</label>
                                <input type="number" name="kalori" required
                                    class="w-full h-10 border rounded-md px-3 focus:ring-2 focus:ring-green-500">
                            </div>
                            <div>
                                <label class="text-sm font-medium">Porsi</label>
                                <input name="porsi" placeholder="100-150 gram" required
                                    class="w-full h-10 border rounded-md px-3 focus:ring-2 focus:ring-green-500">
                            </div>
                        </div>
                        {{-- Porsi Disarankan --}}
                        <div>
                            <label class="text-sm font-medium">Porsi Disarankan</label>
                            <textarea name="porsi_disarankan" placeholder="Contoh: 2–3 sendok makan per porsi, 2x sehari"
                                class="w-full border rounded-md px-3 py-2 h-20 focus:ring-2 focus:ring-green-500" required></textarea>
                        </div>

                        {{-- Nutrisi --}}
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label class="text-sm font-medium">Protein (g)</label>
                                <input name="protein" required
                                    class="w-full h-10 border rounded-md px-3 focus:ring-2 focus:ring-green-500">
                            </div>
                            <div>
                                <label class="text-sm font-medium">Karbo (g)</label>
                                <input name="karbo" required
                                    class="w-full h-10 border rounded-md px-3 focus:ring-2 focus:ring-green-500">
                            </div>
                            <div>
                                <label class="text-sm font-medium">Lemak (g)</label>
                                <input name="lemak" required
                                    class="w-full h-10 border rounded-md px-3 focus:ring-2 focus:ring-green-500">
                            </div>
                        </div>

                        {{-- Vitamin --}}
                        <div>
                            <label class="text-sm font-medium">Vitamin (pisahkan dengan koma)</label>
                            <input name="vitamin" placeholder="Vitamin A, C, Zat Besi"
                                class="w-full h-10 border rounded-md px-3 focus:ring-2 focus:ring-green-500">
                        </div>

                        {{-- Tips --}}
                        <div>
                            <label class="text-sm font-medium">Tips (pisahkan enter)</label>
                            <textarea name="tips" class="w-full border rounded-md px-3 py-2 h-24 focus:ring-2 focus:ring-green-500"></textarea>
                        </div>

                        {{-- Submit --}}
                        <button class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg font-semibold">
                            Tambah Makanan
                        </button>

                    </form>

                </div>
            </div>
        </template>

        {{-- TABEL --}}
        <div class="bg-white border rounded-xl overflow-hidden animate-[fadeUp_.8s_ease-out]">
            <table class="w-full text-left">
                <thead class="bg-gray-100 border-b">
                    <tr>
                        <th class="py-3 px-5">Nama</th>
                        <th class="py-3 px-5">Kategori</th>
                        <th class="py-3 px-5">Rentang Usia</th>
                        <th class="py-3 px-5">Kalori</th>
                        <th class="py-3 px-5">Protein</th>
                        <th class="py-3 px-5">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                            @forelse ($data as $item)

                    <tr class="border-b animate-[fadeUp_.85s_ease-out]">
                        <td class="py-4 px-5">{{ $item->judul }}</td>
                        <td class="px-5">{{ $item->kategori }}</td>
                        <td class="px-5">{{ $item->usia }} bulan</td>
                        <td class="px-5">150</td>
                        <td class="px-5">8g</td>
                        <td class="px-5 flex gap-3">
                            <button class="text-gray-700 hover:text-black"><i class="fa-solid fa-pen"></i></button>
                            <button class="text-red-500 hover:text-red-700"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    @empty
        <tr>
            <td colspan="4" class="text-center p-3">Belum ada data</td>
        </tr>
        @endforelse
                </tbody>

            </table>
        </div>
    </div>

    {{-- ANIMATIONS --}}
    <style>
        @keyframes fadeUp {
            0% {
                opacity: 0;
                transform: translateY(12px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .animate-fadeIn {
            animation: fadeIn .2s ease-out;
        }

        .animate-scaleIn {
            animation: scaleIn .2s ease-out;
        }
    </style>

@endsection
