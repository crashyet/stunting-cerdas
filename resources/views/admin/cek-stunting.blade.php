@extends('layouts.admin-layout')

@section('title', 'Data Cek Stunting')

@section('sidebar')
    @include('components.sidebar')
@endsection

@section('content')

<div class="flex flex-col animate-[fadeUp_.5s_ease-out]">

    {{-- HEADER + EXPORT BUTTON --}}
    <div class="flex justify-between items-start mb-2 animate-[fadeUp_.55s_ease-out]">
        <div>
            <h1 class="text-3xl font-bold">Data Cek Stunting</h1>
            <p class="text-gray-500">Lihat semua data hasil pemeriksaan stunting</p>
        </div>

        <button class="px-4 py-2 border rounded-lg bg-white hover:bg-gray-50 flex items-center gap-2 shadow-sm">
            <i class="fa-solid fa-download"></i>
            Export Data
        </button>
    </div>

    {{-- SPACING --}}
    <div class="mb-6 animate-[fadeUp_.6s_ease-out]"></div>

    {{-- TABLE CARD --}}
    <div class="bg-white border rounded-2xl overflow-hidden shadow-sm p-6 animate-[fadeUp_.7s_ease-out]">

        {{-- TITLE CARD --}}
        <h2 class="text-xl font-semibold flex items-center gap-2 mb-4 animate-[fadeUp_.75s_ease-out]">
            <i class="fa-solid fa-heart-pulse text-green-600"></i>
            Riwayat Pemeriksaan (4)
        </h2>

        {{-- TABLE --}}
        <table class="w-full text-left">
            <thead class="bg-gray-100 border-b">
                <tr>
                    <th class="py-3 px-5">Nama Anak</th>
                    <th class="py-3 px-5">Tanggal</th>
                    <th class="py-3 px-5">Usia</th>
                    <th class="py-3 px-5">Tinggi</th>
                    <th class="py-3 px-5">Berat</th>
                    <th class="py-3 px-5">Z-Score TB</th>
                    <th class="py-3 px-5">Z-Score BB</th>
                    <th class="py-3 px-5">Status</th>
                </tr>
            </thead>

            <tbody>

                {{-- ROW 1 --}}
                <tr class="border-b animate-[fadeUp_.8s_ease-out]">
                    <td class="py-4 px-5">Ahmad Rizki</td>
                    <td class="px-5">20/1/2024</td>
                    <td class="px-5">22 bulan</td>
                    <td class="px-5">85 cm</td>
                    <td class="px-5">12 kg</td>
                    <td class="px-5">-1.20</td>
                    <td class="px-5">-0.80</td>
                    <td class="px-5">
                        <span class="px-3 py-1 text-sm rounded-full bg-green-100 text-green-700">Normal</span>
                    </td>
                </tr>

                {{-- ROW 2 --}}
                <tr class="border-b animate-[fadeUp_.85s_ease-out]">
                    <td class="py-4 px-5">Ahmad Rizki</td>
                    <td class="px-5">15/10/2023</td>
                    <td class="px-5">19 bulan</td>
                    <td class="px-5">82 cm</td>
                    <td class="px-5">11.2 kg</td>
                    <td class="px-5">-1.50</td>
                    <td class="px-5">-1.10</td>
                    <td class="px-5">
                        <span class="px-3 py-1 text-sm rounded-full bg-green-100 text-green-700">Normal</span>
                    </td>
                </tr>

                {{-- ROW 3 --}}
                <tr class="border-b animate-[fadeUp_.9s_ease-out]">
                    <td class="py-4 px-5">Ahmad Rizki</td>
                    <td class="px-5">10/7/2023</td>
                    <td class="px-5">16 bulan</td>
                    <td class="px-5">78 cm</td>
                    <td class="px-5">10.5 kg</td>
                    <td class="px-5">-1.80</td>
                    <td class="px-5">-1.30</td>
                    <td class="px-5">
                        <span class="px-3 py-1 text-sm rounded-full bg-yellow-100 text-yellow-700">Berisiko</span>
                    </td>
                </tr>

                {{-- ROW 4 --}}
                <tr class="animate-[fadeUp_.95s_ease-out]">
                    <td class="py-4 px-5">Siti Aisyah</td>
                    <td class="px-5">25/1/2024</td>
                    <td class="px-5">29 bulan</td>
                    <td class="px-5">92 cm</td>
                    <td class="px-5">14 kg</td>
                    <td class="px-5">-0.50</td>
                    <td class="px-5">-0.30</td>
                    <td class="px-5">
                        <span class="px-3 py-1 text-sm rounded-full bg-green-100 text-green-700">Normal</span>
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
