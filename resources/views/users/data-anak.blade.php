@extends('layouts.user-layout')

@section('content')

{{-- ======= HERO ======== --}}
<section class="bg-gradient-to-b from-[#E6F5EC] via-[#ECF5F1] to-[#F8FBFF] dark:from-gray-900 dark:via-gray-850 dark:to-gray-900 pt-10 pb-14 border-a animate-[fadeUp_.5s_ease-out] transition-colors">
    <div class="px-6 md:px-10 lg:px-14 animate-[fadeUp_.6s_ease-out]">
        <div class="flex items-center gap-4 animate-[fadeUp_.7s_ease-out]">
            <div class="w-12 h-12 bg-green-100 rounded-2xl flex items-center justify-center shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-7 h-7 text-green-600"
                     fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 12c2.2 0 4-1.8 4-4s-1.8-4-4-4-4 1.8-4 4 1.8 4 4 4zm-5 8c0-3 2.3-4 5-4s5 1 5 4v1H7v-1z"/>
                </svg>
            </div>

            <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900 dark:text-gray-100 leading-tight transition-colors">
                Data <span class="text-green-600 dark:text-green-400">Anak</span>
            </h1>

        </div>
        <p class="text-gray-600 dark:text-gray-400 mt-3 max-w-2xl text-sm md:text-base leading-relaxed
                  animate-[fadeUp_.8s_ease-out] transition-colors">
            Kelola data anak Anda untuk pemantauan pertumbuhan yang lebih baik.
        </p>
    </div>
</section>


{{-- ===== STICKY NAVBAR ====== --}}
<div class="sticky top-0 z-40 bg-white/70 dark:bg-gray-800/70 backdrop-blur-xl py-4 shadow-sm border-b dark:border-gray-700 animate-[fadeUp_.9s_ease-out] transition-colors">

    <div class="px-6 md:px-14 flex flex-col md:flex-row justify-between items-center gap-4">
        <div class="w-full md:w-1/3 flex items-center bg-white dark:bg-gray-700 px-4 py-2 rounded-full
                    shadow-sm border border-gray-200 dark:border-gray-600 animate-[fadeUp_1s_ease-out] transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-5 w-5 text-gray-400"
                 fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M21 21l-4.35-4.35M10 18a8 8 0 100-16 8 8 0 000 16z"/>
            </svg>

            <input type="text"
                   placeholder="Cari anak..."
                   class="ml-3 w-full bg-transparent text-sm focus:outline-none text-gray-900 dark:text-gray-100">
        </div>

        <button onclick="openModal()" type="button"
           class="px-6 py-2.5 bg-green-600 text-white rounded-full shadow hover:bg-green-700 transition text-sm font-semibold animate-[fadeUp_1.1s_ease-out] flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Anak
        </button>
    </div>
</div>

{{-- ======= LIST DATA ANAK ======== --}}
<div class="px-6 md:px-14 mt-10 pb-20 grid md:grid-cols-2 lg:grid-cols-3 gap-6">

    @forelse($anak as $i => $child)
    
    <div class="child-card rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2
                animate-[fadeUp_{{ 1.2 + ($i * 0.1) }}s_ease-out]">
        
        {{-- HEADER WITH GRADIENT --}}
        <div class="relative p-6 pb-20 {{ $child->jenis_kelamin == 'laki-laki' ? 'bg-gradient-to-br from-blue-400 via-blue-500 to-blue-600' : 'bg-gradient-to-br from-pink-400 via-pink-500 to-pink-600' }}">
            
            {{-- ACTION BUTTONS --}}
            <div class="absolute top-4 right-4 flex gap-2">
                <button class="w-8 h-8 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center hover:bg-white/30 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 3l6 6M4 20l4-1 11-11-4-4L4 15l-1 4z"/>
                    </svg>
                </button>
                <button class="w-8 h-8 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center hover:bg-red-500/80 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 7h12M9 7V5h6v2M10 11v6M14 11v6M5 7l1 12a2 2 0 002 2h8a2 2 0 002-2l1-12"/>
                    </svg>
                </button>
            </div>

            {{-- AVATAR ICON --}}
            <div class="flex justify-center mb-4">
                <div class="w-20 h-20 bg-white/30 backdrop-blur-md rounded-full flex items-center justify-center shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
            </div>

            {{-- NAME & AGE --}}
            <div class="text-center text-white">
                <h3 class="text-xl font-bold mb-1">{{ $child->nama }}</h3>
                <p class="text-white/90 text-sm flex items-center justify-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ $child->umur }} bulan
                </p>
            </div>
        </div>

        {{-- WHITE CARD CONTENT --}}
        <div class="bg-white p-6 -mt-12 mx-4 rounded-2xl shadow-lg relative z-10">
            
            {{-- STATUS BADGE --}}
            <div class="flex justify-center mb-4">
                <span class="px-4 py-1.5 rounded-full text-xs font-semibold bg-gray-100 text-gray-700">
                    {{ $child->jenis_kelamin == 'laki-laki' ? 'Laki-laki' : 'Perempuan' }}
                </span>
            </div>

            {{-- METRICS --}}
            <div class="grid grid-cols-2 gap-3 mb-4">
                {{-- HEIGHT --}}
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-3 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mx-auto text-blue-600 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                    </svg>
                    <p class="text-2xl font-bold text-blue-700">{{ $child->pengukuran->first()->tinggi_badan ?? '-' }}</p>
                    <p class="text-xs text-blue-600">cm</p>
                </div>

                {{-- WEIGHT --}}
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl p-3 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mx-auto text-purple-600 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/>
                    </svg>
                    <p class="text-2xl font-bold text-purple-700">{{ $child->pengukuran->first()->berat ?? '-' }}</p>
                    <p class="text-xs text-purple-600">kg</p>
                </div>
            </div>

            {{-- LAST CHECK DATE --}}
            <div class="flex items-center justify-center gap-2 text-gray-500 text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span>Ditambahkan: {{ $child->created_at->format('d M Y') }}</span>
            </div>
        </div>
    </div>
    
    @empty
    {{-- EMPTY STATE --}}
    <div class="col-span-full flex flex-col items-center justify-center py-20">
        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
        </div>
        <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum Ada Data Anak</h3>
        <p class="text-gray-500 mb-6">Klik tombol "Tambah Anak" untuk menambahkan data anak pertama</p>
        <button onclick="openModal()" type="button"
            class="px-6 py-3 bg-green-600 text-white rounded-xl font-semibold hover:bg-green-700 transition flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Anak
        </button>
    </div>
    @endforelse
</div>

{{-- ======= MODAL POPUP ======= --}}
<div id="modalOverlay" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden items-center justify-center p-4">
    <div id="modalContent" class="bg-white dark:bg-gray-800 rounded-3xl shadow-2xl max-w-md w-full max-h-[90vh] overflow-y-auto transform scale-95 opacity-0 transition-all duration-300">
        
        {{-- MODAL HEADER --}}
        <div class="sticky top-0 bg-gradient-to-r from-green-500 to-green-600 p-6 rounded-t-3xl">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-white flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                    Tambah Data Anak
                </h2>
                <button onclick="closeModal()" type="button" class="w-8 h-8 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        {{-- MODAL BODY --}}
        <form id="childForm" onsubmit="handleSubmit(event)" class="p-6 space-y-5">
            
            {{-- NAMA ANAK --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 transition-colors">Nama Anak *</label>
                <input type="text" id="childName" required
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                    placeholder="Masukkan nama anak">
            </div>

            {{-- JENIS KELAMIN --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 transition-colors">Jenis Kelamin *</label>
                <div class="grid grid-cols-2 gap-3">
                    <label class="relative cursor-pointer">
                        <input type="radio" name="gender" value="laki-laki" required class="peer sr-only">
                        <div class="p-4 border-2 border-gray-300 dark:border-gray-600 rounded-xl peer-checked:border-blue-500 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-900/20 transition flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span class="font-medium text-gray-700 dark:text-gray-200 transition-colors">Laki-laki</span>
                        </div>
                    </label>
                    <label class="relative cursor-pointer">
                        <input type="radio" name="gender" value="perempuan" required class="peer sr-only">
                        <div class="p-4 border-2 border-gray-300 dark:border-gray-600 rounded-xl peer-checked:border-pink-500 peer-checked:bg-pink-50 dark:peer-checked:bg-pink-900/20 transition flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-pink-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span class="font-medium text-gray-700 dark:text-gray-200 transition-colors">Perempuan</span>
                        </div>
                    </label>
                </div>
            </div>

            {{-- UMUR (BULAN) --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 transition-colors">Umur (bulan) *</label>
                <input type="number" id="age" required min="0" max="60" step="1"
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                    placeholder="Contoh: 24">
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 transition-colors">Masukkan umur anak dalam bulan (0-60 bulan)</p>
            </div>

            {{-- TINGGI & BERAT --}}
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 transition-colors">Tinggi (cm) *</label>
                    <input type="number" id="height" required min="40" max="150" step="0.1"
                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                        placeholder="85">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 transition-colors">Berat (kg) *</label>
                    <input type="number" id="weight" required min="2" max="50" step="0.1"
                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                        placeholder="12">
                </div>
            </div>

            {{-- BUTTONS --}}
            <div class="flex gap-3 pt-4">
                <button type="button" onclick="closeModal()"
                    class="flex-1 px-6 py-3 border-2 border-gray-300 text-gray-700 rounded-xl font-semibold hover:bg-gray-50 transition">
                    Batal
                </button>
                <button type="submit"
                    class="flex-1 px-6 py-3 bg-green-600 text-white rounded-xl font-semibold hover:bg-green-700 transition flex items-center justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Tambah
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ======= SUCCESS MODAL ======= --}}
<div id="successModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden items-center justify-center p-4">
    <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-2xl max-w-sm w-full p-8 text-center transform scale-95 opacity-0 transition-all duration-300" id="successContent">
        {{-- SUCCESS ICON --}}
        <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
        </div>
        
        <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-2 transition-colors">Berhasil!</h3>
        <p class="text-gray-600 dark:text-gray-400 mb-1 transition-colors" id="successMessage">Data anak berhasil ditambahkan</p>
        <p class="text-sm text-gray-400 dark:text-gray-500 mb-6 transition-colors">Data sudah tersimpan ke database</p>
        
        <button onclick="closeSuccessModal()" type="button"
            class="w-full px-6 py-3 bg-green-600 text-white rounded-xl font-semibold hover:bg-green-700 transition">
            OK, Mengerti
        </button>
    </div>
</div>

{{-- ======= JAVASCRIPT ======= --}}
<script>
// Modal Controls
function openModal() {
    const overlay = document.getElementById('modalOverlay');
    const content = document.getElementById('modalContent');
    
    overlay.classList.remove('hidden');
    overlay.classList.add('flex');
    
    // Trigger animation
    setTimeout(() => {
        content.classList.remove('scale-95', 'opacity-0');
        content.classList.add('scale-100', 'opacity-100');
    }, 10);
}

function closeModal() {
    const overlay = document.getElementById('modalOverlay');
    const content = document.getElementById('modalContent');
    
    content.classList.remove('scale-100', 'opacity-100');
    content.classList.add('scale-95', 'opacity-0');
    
    setTimeout(() => {
        overlay.classList.remove('flex');
        overlay.classList.add('hidden');
        document.getElementById('childForm').reset();
    }, 300);
}

// Close modal when clicking outside
document.getElementById('modalOverlay')?.addEventListener('click', function(e) {
    if (e.target === this) {
        closeModal();
    }
});

// Form Submit Handler
async function handleSubmit(event) {
    event.preventDefault();
    
    const formData = {
        nama: document.getElementById('childName').value,
        jenis_kelamin: document.querySelector('input[name="gender"]:checked').value,
        umur: document.getElementById('age').value,
        tinggi_badan: document.getElementById('height').value,
        berat_badan: document.getElementById('weight').value
    };
    
    console.log('Form Data:', formData);
    
    try {
        // Get CSRF token
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content || 
                         document.querySelector('input[name="_token"]')?.value;
        
        if (!csrfToken) {
            throw new Error('CSRF token tidak ditemukan');
        }
        
        console.log('Sending request to:', '{{ route("user.dataanak.store") }}');
        
        // Send data to backend
        const response = await fetch('{{ route("user.dataanak.store") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify(formData)
        });

        console.log('Response status:', response.status);
        
        if (!response.ok) {
            const errorData = await response.json().catch(() => ({}));
            console.error('Error response:', errorData);
            throw new Error(errorData.message || 'Gagal menyimpan data');
        }

        const result = await response.json();
        console.log('Success:', result);
        
        // Close form modal
        closeModal();
        
        // Show success modal
        setTimeout(() => {
            showSuccessModal(formData.nama);
            
            // Reload page after 2 seconds to show new data
            setTimeout(() => {
                window.location.reload();
            }, 2000);
        }, 400);
        
    } catch (error) {
        console.error('Error:', error);
        alert('Gagal menyimpan data: ' + error.message);
    }
}

// Success Modal Controls
function showSuccessModal(childName) {
    const overlay = document.getElementById('successModal');
    const content = document.getElementById('successContent');
    const message = document.getElementById('successMessage');
    
    message.textContent = `Data anak "${childName}" berhasil ditambahkan`;
    
    overlay.classList.remove('hidden');
    overlay.classList.add('flex');
    
    setTimeout(() => {
        content.classList.remove('scale-95', 'opacity-0');
        content.classList.add('scale-100', 'opacity-100');
    }, 10);
}

function closeSuccessModal() {
    const overlay = document.getElementById('successModal');
    const content = document.getElementById('successContent');
    
    content.classList.remove('scale-100', 'opacity-100');
    content.classList.add('scale-95', 'opacity-0');
    
    setTimeout(() => {
        overlay.classList.remove('flex');
        overlay.classList.add('hidden');
    }, 300);
}

// Search Functionality
const searchInput = document.querySelector('input[placeholder="Cari anak..."]');
searchInput?.addEventListener('input', function(e) {
    const searchTerm = e.target.value.toLowerCase();
    const cards = document.querySelectorAll('.child-card');
    
    cards.forEach(card => {
        const name = card.querySelector('h3').textContent.toLowerCase();
        if (name.includes(searchTerm)) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
});
</script>

{{-- ======= KEYFRAMES ====== --}}
<style>
@keyframes fadeUp {
    0% { opacity: 0; transform: translateY(14px); }
    100% { opacity: 1; transform: translateY(0); }
}
</style>

@endsection