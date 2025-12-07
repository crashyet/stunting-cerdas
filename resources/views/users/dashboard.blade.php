@extends('layouts.user-layout')

@section('content')

{{-- ========================== HERO ========================== --}}
<section class="relative w-screen left-1/2 right-1/2 -ml-[50vw] -mr-[50vw]
    bg-gradient-to-b from-[#E6F5EC] via-[#ECF5F1] to-[#F8FBFF]
    pt-10 pb-14 md:pt-12 md:pb-16 border-a animate-fadeUp">

    <div class="pl-6 md:pl-14 lg:pl-20 pr-6 animate-fadeUp delay-1">
        <div class="flex items-center gap-4 animate-fadeUp delay-2">

            {{-- ICON DASHBOARD --}}
            <div class="w-14 h-14 bg-green-100 rounded-2xl flex items-center justify-center shadow-sm animate-fadeUp delay-3">
                <svg xmlns="http://www.w3.org/2000/svg" 
                     class="w-8 h-8 text-green-600"
                     fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 13h4v8H3v-8zm7-6h4v14h-4V7zm7-4h4v18h-4V3z" />
                </svg>
            </div>

            <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900 leading-tight animate-fadeUp delay-4">
                Dashboard <span class="text-green-600">Monitoring</span>
            </h1>
        </div>

        <p class="text-gray-600 mt-3 max-w-2xl text-sm md:text-base leading-relaxed animate-fadeUp delay-5">
            Pantau perkembangan dan tren pertumbuhan anak setiap bulan secara menyeluruh.
        </p>
    </div>
</section>



{{-- ========================== SUMMARY CARDS ========================== --}}
<div class="px-6 md:px-14 mt-12 grid md:grid-cols-4 gap-6">

    {{-- TOTAL ANAK --}}
    <div class="p-6 rounded-3xl bg-white border shadow-sm flex flex-col animate-fadeUp delay-1">
        <p class="text-gray-500 text-sm">Total Anak</p>
        <h2 class="text-3xl font-extrabold text-green-600 mt-2">2</h2>
    </div>

    {{-- STATUS NORMAL --}}
    <div class="p-6 rounded-3xl bg-green-50 border border-green-100 shadow-sm flex flex-col animate-fadeUp delay-2">
        <p class="text-gray-600 text-sm">Status Normal</p>
        <h2 class="text-3xl font-extrabold text-green-600 mt-2">3</h2>
        <p class="text-sm text-green-500 mt-1">↑ 5% vs bulan lalu</p>
    </div>

    {{-- BERISIKO --}}
    <div class="p-6 rounded-3xl bg-yellow-50 border border-yellow-100 shadow-sm flex flex-col animate-fadeUp delay-3">
        <p class="text-gray-600 text-sm">Status Berisiko</p>
        <h2 class="text-3xl font-extrabold text-yellow-600 mt-2">1</h2>
        <!-- NOTE: Pastikan kelas ini dipertahankan (ubah style atau kelas separingly) -->
    </div>

    {{-- STUNTING --}}
    <div class="p-6 rounded-3xl bg-red-50 border border-red-100 shadow-sm flex flex-col animate-fadeUp delay-4">
        <p class="text-gray-600 text-sm">Status Stunting</p>
        <h2 class="text-3xl font-extrabold text-red-600 mt-2">0</h2>
    </div>

</div>


{{-- ========================== CHART SECTION ========================== --}}
<div class="px-6 md:px-14 mt-12 grid md:grid-cols-12 gap-10">

    {{-- LINE CHART --}}
    <div class="col-span-12 md:col-span-8 p-6 bg-white rounded-3xl border shadow-sm animate-fadeUp delay-1">
        <h3 class="font-semibold text-lg mb-4 flex items-center gap-2 animate-fadeUp delay-2">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-6 h-6 text-green-600"
                 fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 17l6-6 4 4 7-7" />
            </svg>
            Tren Pertumbuhan
        </h3>

        <div class="relative h-[300px] animate-fadeUp delay-3">
            <canvas id="growthChart"></canvas>
        </div>
    </div>

    {{-- DOUGHNUT CHART --}}
    <div class="col-span-12 md:col-span-4 p-6 bg-white rounded-3xl border shadow-sm animate-fadeUp delay-2">
        <h3 class="font-semibold text-lg mb-4 flex items-center gap-2 animate-fadeUp delay-3">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-6 h-6 text-blue-600"
                 fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="9" />
            </svg>
            Distribusi Status
        </h3>

        <div class="relative h-[260px] flex justify-center items-center animate-fadeUp delay-4">
            <canvas id="statusChart" class="max-h-[240px]"></canvas>
        </div>
    </div>

</div>


{{-- ========================== RIWAYAT PEMERIKSAAN ========================== --}}
<div class="px-6 md:px-14 mt-12 mb-10">
    <div class="p-8 bg-white rounded-3xl border shadow-sm animate-fadeUp">

        <h3 class="font-bold text-xl mb-6 flex items-center gap-2 animate-fadeUp delay-1">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-6 text-gray-700"
                fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            Riwayat Pemeriksaan Terakhir
        </h3>

        @foreach([
            ['nama'=>'Ahmad Rizki','tanggal'=>'20 Januari 2024','tinggi'=>85,'berat'=>12,'status'=>'Normal','color'=>'green'],
            ['nama'=>'Ahmad Rizki','tanggal'=>'15 Oktober 2023','tinggi'=>82,'berat'=>11.2,'status'=>'Normal','color'=>'green'],
            ['nama'=>'Ahmad Rizki','tanggal'=>'10 Juli 2023','tinggi'=>78,'berat'=>10.5,'status'=>'Berisiko','color'=>'yellow'],
            ['nama'=>'Siti Aisyah','tanggal'=>'25 Januari 2024','tinggi'=>92,'berat'=>14,'status'=>'Normal','color'=>'green'],
        ] as $item)

        <div class="p-4 rounded-2xl bg-gray-100 mb-3 flex justify-between items-center animate-fadeUp delay-{{ $loop->iteration + 1 }}">

            {{-- LEFT --}}
            <div>
                <p class="font-semibold flex items-center gap-2 text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 text-green-600"
                        fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 12c2.2 0 4-1.7 4-4s-1.8-4-4-4-4 1.7-4 4 1.8 4 4 4zm-5 8c0-3 2.2-4 5-4s5 1 5 4v1H7v-1z" />
                    </svg>
                    {{ $item['nama'] }}
                </p>
                <p class="text-gray-500 text-sm">{{ $item['tanggal'] }}</p>
            </div>

            {{-- RIGHT --}}
            <div class="flex items-center gap-4">
                <span class="text-gray-700 font-medium">{{ $item['tinggi'] }} cm • {{ $item['berat'] }} kg</span>

                <span class="px-3 py-1 text-sm rounded-full
                    @if($item['color']=='green') bg-green-100 text-green-600
                    @elseif($item['color']=='yellow') bg-yellow-100 text-yellow-600
                    @endif">
                    {{ $item['status'] }}
                </span>
            </div>

        </div>
        @endforeach

    </div>
</div>


{{-- ========================== INSIGHT ========================== --}}
<div class="px-6 md:px-14 mt-10 mb-20">
    <div class="p-8 bg-green-50 border border-green-100 rounded-3xl shadow-sm animate-fadeUp delay-1">

        <h3 class="font-bold text-xl mb-4 flex items-center gap-2 animate-fadeUp delay-2">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-6 text-yellow-500"
                fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 2a7 7 0 017 7c0 3-2 5-3 6-1 1-.8 2-.8 2H9s.2-1-.8-2c-1-1-3-3-3-6a7 7 0 017-7zm0 18v2" />
            </svg>
            Insight Pertumbuhan
        </h3>

        <ul class="space-y-2 text-gray-700 text-sm animate-fadeUp delay-3">
            <li class="flex gap-2">
                <span class="text-green-600">●</span>
                Pertumbuhan tinggi badan meningkat 7 cm dalam 6 bulan terakhir.
            </li>

            <li class="flex gap-2">
                <span class="text-yellow-500">●</span>
                Perhatikan asupan protein untuk menjaga tren pertumbuhan positif.
            </li>
        </ul>

    </div>
</div>

@endsection



{{-- ========================== ANIMATION ========================== --}}
<style>
@keyframes fadeUp {
    0% { opacity: 0; transform: translateY(14px); }
    100% { opacity: 1; transform: translateY(0); }
}

.animate-fadeUp {
    opacity: 0;
    animation: fadeUp .6s ease-out forwards;
}

.delay-1 { animation-delay: .1s; }
.delay-2 { animation-delay: .2s; }
.delay-3 { animation-delay: .3s; }
.delay-4 { animation-delay: .4s; }
.delay-5 { animation-delay: .5s; }
</style>
