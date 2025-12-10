@extends('layouts.admin-layout')

@section('title', 'Manajemen User')

@section('sidebar')
    @include('components.sidebar')
@endsection

@section('content')

<div class="flex flex-col animate-[fadeUp_.5s_ease-out]">

    {{-- TITLE --}}
    <h1 class="text-3xl font-bold mb-2 animate-[fadeUp_.55s_ease-out]">Manajemen User</h1>
    <p class="text-gray-500 mb-8 animate-[fadeUp_.6s_ease-out]">Kelola pengguna yang terdaftar di sistem</p>

    {{-- SEARCH BAR --}}
    <div class="bg-white rounded-xl border px-5 py-4 flex items-center gap-3 mb-6 shadow-sm animate-[fadeUp_.65s_ease-out]">
        <i class="fa-solid fa-magnifying-glass text-gray-400 text-lg"></i>
        <input type="text" placeholder="Cari pengguna..."
               class="w-full focus:outline-none text-gray-700">
    </div>

    {{-- TABLE CARD --}}
    <div class="bg-white border rounded-2xl overflow-hidden shadow-sm px-4 py-4 animate-[fadeUp_.75s_ease-out]">

        <h2 class="text-xl font-semibold flex items-center gap-2 mb-4 animate-[fadeUp_.8s_ease-out]">
            <i class="fa-solid fa-users text-green-600"></i>
            Daftar Pengguna (4)
        </h2>

        <table class="w-full text-left">
            <thead class="bg-gray-100 border-b">
                <tr>
                    <th class="py-3 px-5">Nama</th>
                    <th class="py-3 px-5">Email</th>
                    <th class="py-3 px-5">Jumlah Anak</th>
                    <th class="py-3 px-5">Terakhir Aktif</th>
                    <th class="py-3 px-5"></th>
                    <th class="py-3 px-5">Aksi</th>
                </tr>
            </thead>

            <tbody>
 @foreach ($users as $user)
                {{-- ROW 1 --}}
                <tr class="border-b hover:bg-gray-50 animate-[fadeUp_.85s_ease-out]">
                    <td class="py-4 px-5">{{ $user->name }}</td>
                    <td class="px-5">{{ $user->email }}</td>
                    <td class="px-5">{{ $user->  }}</td>
                    <td class="px-5">{{ $user->updated_at }}</td>
                    <td class="px-5">
                        
                    </td>
                    <td class="px-5 flex gap-3 text-lg">
                        <button class="text-green-600 hover:text-green-800"><i class="fa-solid fa-user"></i></button>
                        <button class="text-gray-700 hover:text-black"><i class="fa-solid fa-key"></i></button>
                    </td>
                </tr>
    @endforeach

                {{-- ROW 2 --}}
                <tr class="border-b hover:bg-gray-50 animate-[fadeUp_.9s_ease-out]">
                    <td class="py-4 px-5">Siti Rahayu</td>
                    <td class="px-5">siti@email.com</td>
                    <td class="px-5">1</td>
                    <td class="px-5">22/1/2024</td>
                    <td class="px-5">
                        <span class="px-3 py-1 text-sm rounded-full bg-green-100 text-green-700">
                            Aktif
                        </span>
                    </td>
                    <td class="px-5 flex gap-3 text-lg">
                        <button class="text-green-600 hover:text-green-800"><i class="fa-solid fa-user"></i></button>
                        <button class="text-gray-700 hover:text-black"><i class="fa-solid fa-key"></i></button>
                    </td>
                </tr>

                {{-- ROW 3 --}}
                <tr class="border-b hover:bg-gray-50 animate-[fadeUp_.95s_ease-out]">
                    <td class="py-4 px-5">Ahmad Wijaya</td>
                    <td class="px-5">ahmad@email.com</td>
                    <td class="px-5">3</td>
                    <td class="px-5">10/1/2024</td>
                    <td class="px-5">
                        <span class="px-3 py-1 text-sm rounded-full bg-gray-200 text-gray-700">
                            Nonaktif
                        </span>
                    </td>
                    <td class="px-5 flex gap-3 text-lg">
                        <button class="text-green-600 hover:text-green-800"><i class="fa-solid fa-user"></i></button>
                        <button class="text-gray-700 hover:text-black"><i class="fa-solid fa-key"></i></button>
                    </td>
                </tr>

                {{-- ROW 4 --}}
                <tr class="hover:bg-gray-50 animate-[fadeUp_1s_ease-out]">
                    <td class="py-4 px-5">Dewi Lestari</td>
                    <td class="px-5">dewi@email.com</td>
                    <td class="px-5">1</td>
                    <td class="px-5">23/1/2024</td>
                    <td class="px-5">
                        <span class="px-3 py-1 text-sm rounded-full bg-green-100 text-green-700">
                            Aktif
                        </span>
                    </td>
                    <td class="px-5 flex gap-3 text-lg">
                        <button class="text-green-600 hover:text-green-800"><i class="fa-solid fa-user"></i></button>
                        <button class="text-gray-700 hover:text-black"><i class="fa-solid fa-key"></i></button>
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
