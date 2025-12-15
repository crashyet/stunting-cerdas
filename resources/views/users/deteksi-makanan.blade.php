@extends('layouts.user-layout')

@section('content')

{{-- ================= ANIMASI ================= --}}
<style>
@keyframes fadeUp {
    0% { opacity: 0; transform: translateY(14px); }
    100% { opacity: 1; transform: translateY(0); }
}
</style>

{{-- ====== HERO ====== --}}
<section class="bg-gradient-to-b from-[#E6F5EC] via-[#ECF5F1] to-[#F8FBFF] pt-10 pb-14">
    <div class="px-6 md:px-10 lg:px-14">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 bg-green-100 rounded-2xl flex items-center justify-center shadow-sm animate-[fadeUp_.6s_ease-out]">
                {{-- CAMERA ICON --}}
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-8 h-8 text-green-600"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 7h4l2-2h6l2 2h4v12H3V7z"/>
                    <circle cx="12" cy="13" r="3"/>
                </svg>
            </div>

            <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900 animate-[fadeUp_.7s_ease-out]">
                Deteksi <span class="text-green-600">Makanan</span>
            </h1>
        </div>

        <p class="text-gray-600 mt-3 max-w-2xl text-sm md:text-base animate-[fadeUp_.8s_ease-out]">
            Upload foto makanan untuk mendapatkan analisis gizi secara otomatis.
        </p>
    </div>
</section>

{{-- ====== MAIN CONTENT ====== --}}
<div class="container mx-auto px-6 md:px-14 mt-10 pb-24">
    <div class="grid md:grid-cols-2 gap-8 items-start">

        {{-- ===== KOLOM KIRI ===== --}}
        <div class="flex flex-col gap-8 ">

            {{-- === UPLOAD CARD === --}}
            <div class="bg-white rounded-3xl shadow-sm border p-6 animate-[fadeUp_1s_ease-out]">

                <h2 class="text-lg font-semibold flex items-center gap-2 mb-4">
                    {{-- UPLOAD ICON --}}
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 text-green-600"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1M12 12v7m0-7l-3 3m3-3l3 3m-6-9h6"/>
                    </svg>
                    Upload Foto Makanan
                </h2>

                <!-- INPUT FILE (WAJIB ADA) -->
                <input
                    type="file"
                    id="foto"
                    name="foto"
                    accept="image/*"
                    class="hidden"
                    onchange="previewImage(event)"
                >

                <!-- AREA UPLOAD -->
                <label for="foto" id="uploadArea"
                    class="border-2 border-dashed border-green-200 rounded-2xl p-10
                          flex flex-col items-center justify-center text-center
                          bg-green-50/40 cursor-pointer transition hover:bg-green-50">

                    <div class="w-16 h-16 bg-green-100 rounded-full
                                flex items-center justify-center mb-4">
                        {{-- IMAGE ICON --}}
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-8 h-8 text-green-600"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 16l4-4a3 3 0 014 0l4 4m-8-8h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>

                    <p class="font-medium text-gray-700">
                        Klik atau drag foto ke sini
                    </p>
                    <p class="text-sm text-gray-500 mt-1">
                        Format: JPG, PNG, WEBP (Maks. 10MB)
                    </p>

                    <!-- TOMBOL PILIH GAMBAR -->
                    <div
                        class="mt-4 px-6 py-2.5 border border-gray-300 rounded-xl
                              text-sm font-medium hover:bg-gray-50 transition
                              flex items-center gap-2">

                        {{-- BUTTON ICON --}}
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-4 h-4"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 4v16m8-8H4"/>
                        </svg>
                        Pilih Gambar
                    </div>

                </label>

                <!-- PREVIEW GAMBAR -->
                <div id="imagePreview" class="hidden mt-4">
                    <div class="relative rounded-2xl overflow-hidden border-2 border-green-200">
                        <img id="previewImg" src="" alt="Preview" class="w-full h-64 object-cover">
                        <button onclick="removeImage()" type="button"
                            class="absolute top-2 right-2 bg-red-500 hover:bg-red-600 text-white rounded-full p-2 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>

                    <!-- BUTTON DETEKSI -->
                    <button onclick="analyzeFoodImage()" id="analyzeBtn" type="button"
                        class="w-full mt-4 px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-xl transition flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Deteksi Makanan
                    </button>
                </div>
            </div>

            {{-- === TIPS FOTO === --}}
            <div class="rounded-2xl p-5 bg-gradient-to-r from-blue-50 via-blue-100/50 to-blue-50 border border-blue-200 shadow-sm animate-[fadeUp_1s_ease-out]">
                <h3 class="font-semibold mb-4 flex items-center gap-2">
                    {{-- LIGHT BULB ICON --}}
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5 text-yellow-500"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 3a7 7 0 00-4 12v2h8v-2a7 7 0 00-4-12z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 21h6"/>
                    </svg>
                    Tips Foto yang Baik
                </h3>

                <ul class="space-y-3 text-sm text-gray-700">

                    @foreach ([
                        'Pastikan pencahayaan cukup terang',
                        'Ambil foto dari atas (bird’s eye view)',
                        'Fokus pada satu jenis makanan',
                        'Hindari bayangan atau pantulan berlebih'
                    ] as $tip)

                    <li class="flex items-start gap-2">
                        {{-- CHECK ICON --}}
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-4 h-4 text-green-600 mt-0.5"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5 13l4 4L19 7"/>
                        </svg>
                        {{ $tip }}
                    </li>

                    @endforeach
                </ul>
            </div>
        </div>

        {{-- ===== KOLOM KANAN ===== --}}
        <div class="bg-white rounded-3xl shadow-sm border p-8 animate-[fadeUp_1.2s_ease-out]">
            
            <h2 class="text-lg font-semibold flex items-center gap-2 mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
                Hasil Analisis
            </h2>

            <!-- PLACEHOLDER ICON -->
            <div id="placeholderResult" class="flex flex-col items-center justify-center text-center py-10">
                <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-10 h-10 text-gray-400"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M7 3H5a2 2 0 00-2 2v2m0 10v2a2 2 0 002 2h2m10-18h2a2 2 0 012 2v2m0 10v2a2 2 0 01-2 2h-2"/>
                    </svg>
                </div>

                <h3 class="text-lg font-semibold text-gray-700">
                    Belum Ada Hasil
                </h3>

                <p class="text-gray-500 text-sm mt-2 max-w-sm">
                    Upload foto makanan dan klik tombol
                    <strong>Deteksi Makanan</strong> untuk mendapatkan
                    analisis gizi lengkap.
                </p>
            </div>

            <!-- HASIL DETEKSI -->
            <div id="resultContainer" class="hidden space-y-4"></div>
        </div>
    </div>
</div>

<script>
let selectedFile = null;

// Preview gambar yang dipilih
function previewImage(event) {
    const file = event.target.files[0];
    if (!file) return;

    // Validasi ukuran file (max 10MB)
    if (file.size > 10 * 1024 * 1024) {
        alert('Ukuran file terlalu besar! Maksimal 10MB');
        return;
    }

    // Validasi tipe file
    if (!file.type.startsWith('image/')) {
        alert('File harus berupa gambar!');
        return;
    }

    selectedFile = file;

    // Tampilkan preview
    const reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById('previewImg').src = e.target.result;
        document.getElementById('uploadArea').classList.add('hidden');
        document.getElementById('imagePreview').classList.remove('hidden');
    };
    reader.readAsDataURL(file);
}

// Hapus gambar
function removeImage() {
    selectedFile = null;
    document.getElementById('foto').value = '';
    document.getElementById('uploadArea').classList.remove('hidden');
    document.getElementById('imagePreview').classList.add('hidden');
    document.getElementById('previewImg').src = '';
}

// Analisis gambar makanan
async function analyzeFoodImage() {
    if (!selectedFile) {
        alert('Pilih gambar terlebih dahulu!');
        return;
    }

    const analyzeBtn = document.getElementById('analyzeBtn');
    const resultContainer = document.getElementById('resultContainer');
    const placeholderResult = document.getElementById('placeholderResult');

    // Hide placeholder
    placeholderResult.classList.add('hidden');

    // Show loading state
    analyzeBtn.disabled = true;
    analyzeBtn.innerHTML = `
        <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        Menganalisis...
    `;

    resultContainer.classList.remove('hidden');
    resultContainer.innerHTML = `
        <div class="flex flex-col items-center justify-center py-10">
            <svg class="animate-spin h-12 w-12 text-green-600 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <p class="text-gray-600 font-medium">Menganalisis makanan...</p>
            <p class="text-gray-400 text-sm mt-1">Mohon tunggu sebentar</p>
        </div>
    `;

    try {
        // Buat FormData
        const formData = new FormData();
        formData.append('image', selectedFile);

        // Kirim ke server Node.js
        const response = await fetch('http://localhost:3000/analyze', {
            method: 'POST',
            body: formData
        });

        if (!response.ok) {
            throw new Error(`Server error: ${response.status}`);
        }

        const data = await response.json();

        // Tampilkan hasil
        displayResults(data);

    } catch (error) {
        console.error('Error:', error);
        resultContainer.innerHTML = `
            <div class="text-center py-10">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-red-600 font-semibold text-lg mb-2">Gagal Menganalisis</h3>
                <p class="text-gray-600 text-sm">Pastikan server Node.js berjalan di port 3000</p>
                <p class="text-gray-400 text-xs mt-2">${error.message}</p>
            </div>
        `;
    } finally {
        // Reset button
        analyzeBtn.disabled = false;
        analyzeBtn.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            Deteksi Makanan
        `;
    }
}

// Tampilkan hasil deteksi
function displayResults(foods) {
    const resultContainer = document.getElementById('resultContainer');
    
    if (!foods || foods.length === 0) {
        resultContainer.innerHTML = `
            <div class="text-center py-10">
                <p class="text-gray-500">Tidak ada makanan terdeteksi</p>
            </div>
        `;
        return;
    }

    // Hitung total nutrisi
    const total = foods.reduce((acc, food) => ({
        kalori: acc.kalori + (food.kalori || 0),
        protein: acc.protein + (food.protein || 0),
        karbohidrat: acc.karbohidrat + (food.karbohidrat || 0),
        lemak: acc.lemak + (food.lemak || 0)
    }), { kalori: 0, protein: 0, karbohidrat: 0, lemak: 0 });

    let html = `
        <!-- TOTAL NUTRISI -->
        <div class="bg-gradient-to-r from-green-50 to-green-100 rounded-2xl p-6 border border-green-200">
            <h3 class="font-semibold text-green-800 mb-4 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
                Total Nutrisi
            </h3>
            <div class="grid grid-cols-2 gap-3">
                <div class="bg-white rounded-xl p-3 text-center">
                    <p class="text-xs text-gray-500">Kalori</p>
                    <p class="text-lg font-bold text-green-700">${total.kalori.toFixed(0)}</p>
                    <p class="text-xs text-gray-400">kkal</p>
                </div>
                <div class="bg-white rounded-xl p-3 text-center">
                    <p class="text-xs text-gray-500">Protein</p>
                    <p class="text-lg font-bold text-blue-700">${total.protein.toFixed(1)}</p>
                    <p class="text-xs text-gray-400">gram</p>
                </div>
                <div class="bg-white rounded-xl p-3 text-center">
                    <p class="text-xs text-gray-500">Karbohidrat</p>
                    <p class="text-lg font-bold text-orange-700">${total.karbohidrat.toFixed(1)}</p>
                    <p class="text-xs text-gray-400">gram</p>
                </div>
                <div class="bg-white rounded-xl p-3 text-center">
                    <p class="text-xs text-gray-500">Lemak</p>
                    <p class="text-lg font-bold text-red-700">${total.lemak.toFixed(1)}</p>
                    <p class="text-xs text-gray-400">gram</p>
                </div>
            </div>
        </div>

        <!-- DAFTAR MAKANAN -->
        <div class="space-y-3">
            <h3 class="font-semibold text-gray-700 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>
                </svg>
                Makanan Terdeteksi (${foods.length})
            </h3>
    `;

    foods.forEach((food, index) => {
        html += `
            <div class="bg-gray-50 rounded-xl p-4 border border-gray-200 hover:shadow-md transition">
                <div class="flex items-start justify-between mb-2">
                    <h4 class="font-semibold text-gray-800">${index + 1}. ${food.nama_menu}</h4>
                    <span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded-full">${food.estimasi_gram}g</span>
                </div>
                
                ${food.deskripsi ? `<p class="text-sm text-gray-600 mb-3">${food.deskripsi}</p>` : ''}
                
                <div class="grid grid-cols-4 gap-2 text-xs">
                    <div class="text-center bg-white rounded-lg py-2">
                        <p class="text-gray-500">Kalori</p>
                        <p class="font-semibold text-green-600">${food.kalori || 0}</p>
                    </div>
                    <div class="text-center bg-white rounded-lg py-2">
                        <p class="text-gray-500">Protein</p>
                        <p class="font-semibold text-blue-600">${food.protein || 0}g</p>
                    </div>
                    <div class="text-center bg-white rounded-lg py-2">
                        <p class="text-gray-500">Karbo</p>
                        <p class="font-semibold text-orange-600">${food.karbohidrat || 0}g</p>
                    </div>
                    <div class="text-center bg-white rounded-lg py-2">
                        <p class="text-gray-500">Lemak</p>
                        <p class="font-semibold text-red-600">${food.lemak || 0}g</p>
                    </div>
                </div>
                
                ${food.proses_pengolahan ? `
                    <div class="mt-3 pt-3 border-t border-gray-200">
                        <p class="text-xs text-gray-500">Proses Pengolahan:</p>
                        <p class="text-xs text-gray-700 mt-1">${food.proses_pengolahan}</p>
                    </div>
                ` : ''}
            </div>
        `;
    });

    html += '</div>';
    resultContainer.innerHTML = html;
}
</script>

@endsection
