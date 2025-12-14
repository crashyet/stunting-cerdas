@extends('layouts.admin-layout')

@section('title', 'Dashboard Admin')

@section('sidebar')
    @include('components.sidebar')
@endsection

@section('content')

{{-- WRAPPER --}}
<div class="flex flex-col animate-[fadeUp_.5s_ease-out]">

{{-- ===================== HEADER ===================== --}}
<div class="mb-6 animate-[fadeUp_.55s_ease-out]">
    <h1 class="text-3xl font-bold text-gray-800">Dashboard Admin</h1>
    <p class="text-gray-600 mt-1">
        Selamat datang! Pantau statistik dan kelola sistem pencegahan stunting.
    </p>
</div>


{{-- ===================== STAT CARDS ===================== --}}
<div class="grid grid-cols-1 md:grid-cols-4 gap-5">

    {{-- Total Anak --}}
    <div class="bg-green-50 border border-green-200 rounded-xl p-5 shadow-sm flex justify-between items-center 
                animate-[fadeUp_.6s_ease-out]">
        <div>
            <h3 class="text-gray-600 text-sm font-medium">Total Anak Terdaftar</h3>
            <div class="text-3xl font-bold mt-1">1,250</div>
            <p class="text-green-600 text-xs mt-1">⬆ 12% vs bulan lalu</p>
        </div>
        <div class="bg-green-100 p-3 rounded-lg">
            <i class="fa-solid fa-baby text-green-600 text-xl"></i>
        </div>
    </div>

    {{-- Normal --}}
    <div class="bg-green-50 border border-green-200 rounded-xl p-5 shadow-sm flex justify-between items-center 
                animate-[fadeUp_.7s_ease-out]">
        <div>
            <h3 class="text-gray-600 text-sm font-medium">Status Normal</h3>
            <div class="text-3xl font-bold mt-1">1005</div>
            <p class="text-yellow-600 text-xs mt-1">⬇ 3% vs bulan lalu</p>
        </div>
        <div class="bg-green-100 p-3 rounded-lg">
            <i class="fa-solid fa-user-check text-green-600 text-xl"></i>
        </div>
    </div>

    {{-- Berisiko --}}
    <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-5 shadow-sm flex justify-between items-center 
                animate-[fadeUp_.8s_ease-out]">
        <div>
            <h3 class="text-gray-600 text-sm font-medium">Status Berisiko</h3>
            <div class="text-3xl font-bold mt-1">156</div>
            <p class="text-yellow-600 text-xs mt-1">⬇ 3% vs bulan lalu</p>
        </div>
        <div class="bg-yellow-100 p-3 rounded-lg">
            <i class="fa-solid fa-triangle-exclamation text-yellow-600 text-xl"></i>
        </div>
    </div>

    {{-- Stunting --}}
    <div class="bg-red-50 border border-red-200 rounded-xl p-5 shadow-sm flex justify-between items-center
                animate-[fadeUp_.9s_ease-out]">
        <div>
            <h3 class="text-gray-600 text-sm font-medium">Status Stunting</h3>
            <div class="text-3xl font-bold mt-1">89</div>
            <p class="text-red-600 text-xs mt-1">⬆ 5% vs bulan lalu</p>
        </div>
        <div class="bg-red-100 p-3 rounded-lg">
            <i class="fa-solid fa-skull-crossbones text-red-600 text-xl"></i>
        </div>
    </div>

</div>


{{-- ===================== CHART SECTION ===================== --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">

    {{-- Line Chart --}}
    <div class="bg-white border rounded-xl p-5 shadow-sm animate-[fadeUp_1s_ease-out]">
        <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center gap-2">
            <i class="fa-solid fa-chart-line text-green-600"></i> Tren Bulanan
        </h3>
        <canvas id="lineChart" class="h-64"></canvas>
    </div>

    {{-- Bar Chart --}}
    <div class="bg-white border rounded-xl p-5 shadow-sm animate-[fadeUp_1.1s_ease-out]">
        <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center gap-2">
            <i class="fa-solid fa-chart-bar text-blue-600"></i> Distribusi Usia
        </h3>
        <canvas id="donutChart" class="h-64"></canvas>
    </div>

</div>


{{-- ===================== AKSI CEPAT ===================== --}}
<div class="mt-10 bg-white border rounded-xl shadow-sm p-6 animate-[fadeUp_1.2s_ease-out]">
    <h2 class="text-xl font-bold mb-5 text-gray-800">Aksi Cepat</h2>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-5">

        <div class="p-5 bg-gray-100 rounded-xl shadow-sm hover:shadow-md transition flex items-center gap-4 
                    animate-[fadeUp_1.25s_ease-out]">
            <i class="fa-solid fa-file-lines text-green-600 text-2xl"></i>
            <div>
                <h4 class="text-base font-semibold">Kelola Artikel</h4>
                <p class="text-xs text-gray-500">6 item</p>
            </div>
        </div>

        <div class="p-5 bg-gray-100 rounded-xl shadow-sm hover:shadow-md transition flex items-center gap-4 
                    animate-[fadeUp_1.3s_ease-out]">
            <i class="fa-solid fa-utensils text-green-600 text-2xl"></i>
            <div>
                <h4 class="text-base font-semibold">Kelola Makanan</h4>
                <p class="text-xs text-gray-500">12 item</p>
            </div>
        </div>

        <div class="p-5 bg-gray-100 rounded-xl shadow-sm hover:shadow-md transition flex items-center gap-4 
                    animate-[fadeUp_1.35s_ease-out]">
            <i class="fa-solid fa-heart-pulse text-green-600 text-2xl"></i>
            <div>
                <h4 class="text-base font-semibold">Data Stunting</h4>
                <p class="text-xs text-gray-500">45 item</p>
            </div>
        </div>

        <div class="p-5 bg-gray-100 rounded-xl shadow-sm hover:shadow-md transition flex items-center gap-4 
                    animate-[fadeUp_1.4s_ease-out]">
            <i class="fa-solid fa-users text-green-600 text-2xl"></i>
            <div>
                <h4 class="text-base font-semibold">Kelola User</h4>
                <p class="text-xs text-gray-500">4 item</p>
            </div>
        </div>

    </div>
</div>


{{-- ===================== PERHATIAN ===================== --}}
<div class="bg-yellow-50 border border-yellow-200 rounded-xl shadow-sm p-6 mt-8 animate-[fadeUp_1.5s_ease-out]">
    <div class="flex items-start gap-4">
        <div class="bg-yellow-100 rounded-lg p-3">
            <i class="fa-solid fa-triangle-exclamation text-yellow-600 text-2xl"></i>
        </div>

        <div>
            <h3 class="text-lg font-bold mb-1 text-yellow-700">Perhatian</h3>
            <p class="text-gray-700 text-sm">
                Terdapat <b>89 anak</b> dengan status stunting yang memerlukan intervensi segera.
            </p>
            <p class="text-gray-700 text-sm mt-1">
                <b>156 anak</b> dalam status berisiko perlu pemantauan lebih intensif.
            </p>
        </div>
    </div>
</div>

</div>


{{-- ===================== CUSTOM ANIMATION ===================== --}}
<style>
@keyframes fadeUp {
    0% { opacity: 0; transform: translateY(12px); }
    100% { opacity: 1; transform: translateY(0px); }
}
</style>


{{-- ===================== CHART SCRIPT ===================== --}}
<script>
    // LINE CHART
    new Chart(document.getElementById("lineChart"), {
        type: 'line',
        data: {
            labels: ['Jan','Feb','Mar','Apr','Mei','Jun'],
            datasets: [
                { label:'Normal', data:[820,860,900,940,980,1030], borderColor:'#16a34a', borderWidth:2.5, tension:0.35 },
                { label:'Berisiko', data:[150,140,135,130,138,145], borderColor:'#facc15', borderWidth:2.5, tension:0.35 },
                { label:'Stunting', data:[90,85,80,82,88,91], borderColor:'#ef4444', borderWidth:2.5, tension:0.35 }
            ]
        },
        options: {
            scales: {
                y: { beginAtZero:true, grid:{ borderDash:[4,4] }},
                x: { grid:{ display:false }}
            }
        }
    });

    // BAR CHART
    new Chart(document.getElementById("donutChart"), {
        type: 'bar',
        data: {
            labels:['0-6 bulan','6-12 bulan','12-24 bulan','24-36 bulan','36-60 bulan'],
            datasets:[{
                label: 'Jumlah Anak',
                data:[180,220,350,280,210],
                backgroundColor: '#60a5fa',
                borderRadius: 8,
                barThickness: 40
            }]
        },
        options: {
            plugins: { legend: { display:false }},
            scales: {
                y: { beginAtZero: true, grid:{ borderDash:[4,4] }},
                x: { grid:{ display:false }}
            }
        }
    });
</script>

@endsection
