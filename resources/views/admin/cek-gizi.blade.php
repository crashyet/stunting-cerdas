@extends('layouts.admin-layout')

@section('title', 'Data Cek Gizi')

@section('sidebar')
    @include('components.sidebar')
@endsection

@section('content')

<div class="flex flex-col animate-[fadeUp_.5s_ease-out]">

    {{-- TITLE + BUTTON --}}
    <div class="flex justify-between items-start mb-6 animate-[fadeUp_.55s_ease-out]">
        <div>
            <h1 class="text-3xl font-bold">Manajemen Parameter Gizi</h1>
            <p class="text-gray-500">Atur standar kebutuhan gizi harian untuk anak</p>
        </div>

        <button class="px-4 py-2 border border-gray-300 rounded-lg bg-white hover:bg-gray-50 flex items-center gap-2 shadow-sm">
            <i class="fa-solid fa-pen"></i>
            Edit Parameter
        </button>
    </div>

    {{-- GRID PARAMETER --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- PROTEIN --}}
        <div class="bg-white border rounded-2xl p-6 shadow-sm animate-[fadeUp_.65s_ease-out]">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center text-red-500 text-xl">
                    🍗
                </div>
                <h2 class="text-xl font-semibold">Protein</h2>
            </div>

            <p class="text-gray-500 text-sm mb-4">Standar asupan protein harian</p>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-sm text-gray-600">Minimum (gram)</label>
                    <input type="text" value="15"
                           class="mt-1 w-full border rounded-lg px-3 py-2 bg-gray-50">
                </div>

                <div>
                    <label class="text-sm text-gray-600">Maximum (gram)</label>
                    <input type="text" value="25"
                           class="mt-1 w-full border rounded-lg px-3 py-2 bg-gray-50">
                </div>
            </div>
        </div>

        {{-- KARBOHIDRAT --}}
        <div class="bg-white border rounded-2xl p-6 shadow-sm animate-[fadeUp_.7s_ease-out]">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-500 text-xl">
                    🍩
                </div>
                <h2 class="text-xl font-semibold">Karbohidrat</h2>
            </div>

            <p class="text-gray-500 text-sm mb-4">Standar asupan karbohidrat harian</p>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-sm text-gray-600">Minimum (gram)</label>
                    <input type="text" value="45"
                           class="mt-1 w-full border rounded-lg px-3 py-2 bg-gray-50">
                </div>

                <div>
                    <label class="text-sm text-gray-600">Maximum (gram)</label>
                    <input type="text" value="65"
                           class="mt-1 w-full border rounded-lg px-3 py-2 bg-gray-50">
                </div>
            </div>
        </div>

        {{-- LEMAK --}}
        <div class="bg-white border rounded-2xl p-6 shadow-sm animate-[fadeUp_.75s_ease-out]">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center text-yellow-500 text-xl">
                    🥑
                </div>
                <h2 class="text-xl font-semibold">Lemak</h2>
            </div>

            <p class="text-gray-500 text-sm mb-4">Standar asupan lemak harian</p>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-sm text-gray-600">Minimum (gram)</label>
                    <input type="text" value="20"
                           class="mt-1 w-full border rounded-lg px-3 py-2 bg-gray-50">
                </div>

                <div>
                    <label class="text-sm text-gray-600">Maximum (gram)</label>
                    <input type="text" value="35"
                           class="mt-1 w-full border rounded-lg px-3 py-2 bg-gray-50">
                </div>
            </div>
        </div>

        {{-- VITAMIN --}}
        <div class="bg-white border rounded-2xl p-6 shadow-sm animate-[fadeUp_.8s_ease-out]">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center text-orange-500 text-xl">
                    🍊
                </div>
                <h2 class="text-xl font-semibold">Vitamin</h2>
            </div>

            <p class="text-gray-500 text-sm mb-4">Standar asupan vitamin harian</p>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-sm text-gray-600">Minimum (%AKG)</label>
                    <input type="text" value="80"
                           class="mt-1 w-full border rounded-lg px-3 py-2 bg-gray-50">
                </div>

                <div>
                    <label class="text-sm text-gray-600">Maximum (%AKG)</label>
                    <input type="text" value="120"
                           class="mt-1 w-full border rounded-lg px-3 py-2 bg-gray-50">
                </div>
            </div>

        </div>

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
