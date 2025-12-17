@extends('layouts.user-layout')

@section('content')
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900 transition-colors">

        {{-- BACK BUTTON --}}
        <div class="container mx-auto px-4 py-6">
            <a href="{{ route('user.rekomendasi') }}"
                class="inline-flex items-center gap-2 px-5 py-2 rounded-xl
                  text-sm font-semibold hover:bg-gray-100 dark:hover:bg-gray-700 transition text-gray-900 dark:text-gray-100">
                ← Kembali
            </a>
        </div>

        {{-- CONTENT --}}
        <section class="pb-20">
            <div class="container mx-auto px-4">

                {{-- HEADER --}}
                <div class="grid lg:grid-cols-2 gap-8 max-w-5xl mx-auto">

                    {{-- IMAGE --}}
                    <div
                        class="aspect-square rounded-3xl overflow-hidden shadow-sm bg-gradient-to-br from-green-50 to-blue-50 dark:from-green-900/20 dark:to-blue-900/20 transition-colors">
                        <img src="{{ asset('storage/' . $food->gambar) }}" alt="{{ $food->judul }}"
                            class="w-full h-full object-cover">
                    </div>

                    {{-- INFO --}}
                    <div class="space-y-6">

                        <div>
                            <span
                                class="inline-block px-4 py-1 bg-green-100 text-green-700
                                     text-sm font-semibold rounded-full mb-3">
                                {{ $food->kategori }}
                            </span>

                            <h1 class="text-3xl md:text-4xl font-bold mb-2 text-gray-900 dark:text-gray-100 transition-colors">
                                {{ $food->judul }}
                            </h1>

                            <div class="flex flex-wrap gap-4 text-gray-500 text-sm">
                                <span class="inline-flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users w-4 h-4">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg> {{ $food->usia }} bulan</span>
                                <span class="inline-flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock w-4 h-4">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polyline points="12 6 12 12 16 14"></polyline>
                                    </svg> {{ $food->porsi }} gram / porsi</span>
                            </div>
                        </div>

                        {{-- NUTRISI --}}
                        <div class="grid grid-cols-2 gap-4">

                            <div class="bg-green-50 rounded-xl p-5 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-flame w-8 h-8 text-green-600 mx-auto mb-2">
                                    <path
                                        d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z">
                                    </path>
                                </svg>
                                <p class="text-3xl font-bold text-green-600">{{ $food->kalori }}</p>
                                <p class="text-sm text-gray-600">Kalori</p>
                            </div>

                            <div class="bg-blue-50 rounded-xl p-5 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-beef w-8 h-8 text-blue-600 mx-auto mb-2">
                                    <circle cx="12.5" cy="8.5" r="2.5"></circle>
                                    <path
                                        d="M12.5 2a6.5 6.5 0 0 0-6.22 4.6c-1.1 3.13-.78 3.9-3.18 6.08A3 3 0 0 0 5 18c4 0 8.4-1.8 11.4-4.3A6.5 6.5 0 0 0 12.5 2Z">
                                    </path>
                                    <path
                                        d="m18.5 6 2.19 4.5a6.48 6.48 0 0 1 .31 2 6.49 6.49 0 0 1-2.6 5.2C15.4 20.2 11 22 7 22a3 3 0 0 1-2.68-1.66L2.4 16.5">
                                    </path>
                                </svg>
                                <p class="text-3xl font-bold text-blue-600">{{ $food->protein }}g</p>
                                <p class="text-sm text-gray-600">Protein</p>
                            </div>

                            <div class="bg-yellow-50 rounded-xl p-5 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-wheat w-8 h-8 text-amber-600 mx-auto mb-2">
                                    <path d="M2 22 16 8"></path>
                                    <path
                                        d="M3.47 12.53 5 11l1.53 1.53a3.5 3.5 0 0 1 0 4.94L5 19l-1.53-1.53a3.5 3.5 0 0 1 0-4.94Z">
                                    </path>
                                    <path
                                        d="M7.47 8.53 9 7l1.53 1.53a3.5 3.5 0 0 1 0 4.94L9 15l-1.53-1.53a3.5 3.5 0 0 1 0-4.94Z">
                                    </path>
                                    <path
                                        d="M11.47 4.53 13 3l1.53 1.53a3.5 3.5 0 0 1 0 4.94L13 11l-1.53-1.53a3.5 3.5 0 0 1 0-4.94Z">
                                    </path>
                                    <path d="M20 2h2v2a4 4 0 0 1-4 4h-2V6a4 4 0 0 1 4-4Z"></path>
                                    <path
                                        d="M11.47 17.47 13 19l-1.53 1.53a3.5 3.5 0 0 1-4.94 0L5 19l1.53-1.53a3.5 3.5 0 0 1 4.94 0Z">
                                    </path>
                                    <path
                                        d="M15.47 13.47 17 15l-1.53 1.53a3.5 3.5 0 0 1-4.94 0L9 15l1.53-1.53a3.5 3.5 0 0 1 4.94 0Z">
                                    </path>
                                    <path
                                        d="M19.47 9.47 21 11l-1.53 1.53a3.5 3.5 0 0 1-4.94 0L13 11l1.53-1.53a3.5 3.5 0 0 1 4.94 0Z">
                                    </path>
                                </svg>
                                <p class="text-3xl font-bold text-yellow-600">{{ $food->karbo }}g</p>
                                <p class="text-sm text-gray-600">Karbohidrat</p>
                            </div>

                            <div class="bg-gray-100 rounded-xl p-5 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="lucide lucide-droplets w-8 h-8 text-gray-600 text-muted-foreground mx-auto mb-2">
                                    <path
                                        d="M7 16.3c2.2 0 4-1.83 4-4.05 0-1.16-.57-2.26-1.71-3.19S7.29 6.75 7 5.3c-.29 1.45-1.14 2.84-2.29 3.76S3 11.1 3 12.25c0 2.22 1.8 4.05 4 4.05z">
                                    </path>
                                    <path
                                        d="M12.56 6.6A10.97 10.97 0 0 0 14 3.02c.5 2.5 2 4.9 4 6.5s3 3.5 3 5.5a6.98 6.98 0 0 1-11.91 4.97">
                                    </path>
                                </svg>
                                <p class="text-3xl font-bold">{{ $food->lemak }}g</p>
                                <p class="text-sm text-gray-600">Lemak</p>
                            </div>

                        </div>

                        {{-- VITAMIN --}}
                        <div>
                            <h3 class="font-bold text-lg mb-3 dark:text-gray-100 transition-colors">Kandungan Vitamin</h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach (explode(',', $food->vitamin) as $vit)
                                    <span
                                        class="px-4 py-2 bg-green-100 text-green-700
                                             rounded-full text-sm font-medium">
                                        {{ trim($vit) }}
                                    </span>
                                @endforeach
                            </div>
                        </div>

                        {{-- PORSI --}}
                        <div class="bg-green-50 border border-green-200 rounded-xl p-5">
                            <h4 class="font-semibold mb-1">💡 Porsi Disarankan</h4>
                            <p class="text-sm text-gray-600">
                                {{ $food->porsi_disarankan }}
                            </p>
                        </div>

                    </div>
                </div>

                {{-- TIPS --}}
                <div class="max-w-5xl mx-auto mt-12">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 transition-colors">
                        <h3 class="text-xl font-bold mb-4 text-gray-900 dark:text-gray-100 transition-colors">Tips Penyajian</h3>

                        <ul class="space-y-3 text-gray-600 dark:text-gray-400 text-sm transition-colors">
                            @foreach (explode("\n", $food->tips) as $tip)
                                <li class="flex gap-2">
                                    <span class="text-green-600 font-bold">✓</span>
                                    <span>{{ $tip }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
