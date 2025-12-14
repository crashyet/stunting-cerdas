@extends('layouts.user-layout')

@section('content')

{{-- ====== HERO ======= --}}
<section class="bg-gradient-to-b from-[#E6F5EC] via-[#ECF5F1] to-[#F8FBFF] pt-10 pb-14 border-a animate-[fadeUp_.6s_ease-out]">
    <div class="px-6 md:px-10 lg:px-14">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 bg-green-100 rounded-2xl flex items-center justify-center shadow-sm animate-[fadeUp_.8s_ease-out]">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-8 h-8 text-green-600"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900 leading-tight
                       animate-[fadeUp_.9s_ease-out]">
                Cek <span class="text-green-600">Stunting</span>
            </h1>
        </div>

        <p class="text-gray-600 mt-3 max-w-2xl text-sm md:text-base leading-relaxed
                  animate-[fadeUp_1s_ease-out]">
            Hitung Z-score anak berdasarkan standar WHO untuk mengetahui status pertumbuhan.
        </p>
    </div>
</section>

{{-- ======= MAIN WRAPPER ======= --}}
<div class="container mx-auto px-10 md:px-14 mt-10 pb-24">
    <div class="grid md:grid-cols-2 gap-10 items-start">

        {{-- ===== KOLOM KIRI ===== --}}
        <div class="flex flex-col gap-8">

            {{-- ----- FORM ----- --}}
            <div class="p-8 bg-white rounded-3xl shadow-sm border animate-[fadeUp_1s_ease-out]">
                <h2 class="text-xl font-semibold mb-1 flex items-center gap-2 animate-[fadeUp_1.1s_ease-out]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-600" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Form Pemeriksaan
                </h2>

                <p class="text-gray-500 text-sm mb-6 animate-[fadeUp_1.2s_ease-out]">
                    Masukkan data anak untuk menghitung status pertumbuhan.
                </p>

                <form onsubmit="event.preventDefault(); hitungZScore();" class="animate-[fadeUp_1.3s_ease-out]">

                  <label class="text-sm font-medium">Nama Anak</label>
                  <input type="text" id="nama" class="w-full px-4 py-3 border rounded-xl mb-4 focus:ring focus:ring-green-200"
                        placeholder="Masukkan nama anak">

                  <div class="grid grid-cols-2 gap-4 mb-4">
                      <div>
                          <label class="text-sm font-medium">Umur (bulan)</label>
                          <input type="number" id="umur" class="w-full px-4 py-3 border rounded-xl focus:ring focus:ring-green-200"
                                value="24">
                      </div>

                      <div>
                          <label class="text-sm font-medium">Jenis Kelamin</label>
                          <select id="jenis_kelamin" class="w-full px-4 py-3 border rounded-xl focus:ring focus:ring-green-200">
                              <option value="">Pilih</option>
                              <option value="laki">Laki-laki</option>
                              <option value="perempuan">Perempuan</option>
                          </select>
                      </div>
                  </div>

                  <div class="grid grid-cols-2 gap-4 mb-4">
                      <div>
                          <label class="text-sm font-medium">Tinggi Badan (cm)</label>
                          <input type="number" id="tinggi" class="w-full px-4 py-3 border rounded-xl focus:ring focus:ring-green-200"
                                value="85">
                      </div>

                      <div>
                          <label class="text-sm font-medium">Berat Badan (kg)</label>
                          <input type="number" id="berat" class="w-full px-4 py-3 border rounded-xl focus:ring focus:ring-green-200"
                                value="12">
                      </div>
                  </div>

                  <button type="submit" id="submitBtn"
                          class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-4 rounded-xl transition">
                      Hitung Z-Score
                  </button>

              </form>
            </div>

            </div>
        </div>



        {{-- ===================== KOLOM KANAN ===================== --}}
        <div class="p-8 bg-white rounded-3xl shadow-sm border flex flex-col justify-center items-center text-center h-full animate-[fadeUp_1.5s_ease-out]">

          <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-gray-400 mb-4" fill="none"
                  viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
            <div id="hasil" class="text-center text-gray-600">

                <h3 class="text-gray-600 font-medium text-lg">Hasil Akan Tampil Di Sini</h3>
                <p class="text-gray-400 text-sm mt-1 leading-relaxed">
                    Isi form di samping untuk menghitung status pertumbuhan anak
                </p>
            </div>

        </div>



    </div>
</div>

<script>
async function hitungZScore() {
  const hasilEl = document.getElementById("hasil");
  const submitBtn = document.getElementById("submitBtn");
  
  // Get form values
  const nama = document.getElementById("nama").value.trim();
  const umur = parseInt(document.getElementById("umur").value);
  const tinggi = parseFloat(document.getElementById("tinggi").value);
  const berat = parseFloat(document.getElementById("berat").value);
  const jenis_kelamin = document.getElementById("jenis_kelamin").value;

  // Clear previous errors
  clearErrors();

  // Client-side validation
  let hasError = false;

  if (!nama) {
    showError("nama", "Nama anak harus diisi");
    hasError = true;
  }

  if (!umur || umur < 0 || umur > 60) {
    showError("umur", "Umur harus antara 0-60 bulan");
    hasError = true;
  }

  if (!tinggi || tinggi <= 0) {
    showError("tinggi", "Tinggi badan harus lebih dari 0 cm");
    hasError = true;
  }

  if (!berat || berat <= 0) {
    showError("berat", "Berat badan harus lebih dari 0 kg");
    hasError = true;
  }

  if (!jenis_kelamin) {
    showError("jenis_kelamin", "Jenis kelamin harus dipilih");
    hasError = true;
  }

  if (hasError) {
    hasilEl.innerHTML = `
      <div class="text-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-red-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
        </svg>
        <h3 class="text-red-600 font-semibold text-lg">Validasi Gagal</h3>
        <p class="text-gray-500 text-sm mt-2">Mohon periksa kembali form di samping</p>
      </div>
    `;
    return;
  }

  // Show loading state
  submitBtn.disabled = true;
  submitBtn.innerHTML = `
    <svg class="animate-spin h-5 w-5 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
      <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
      <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
    </svg>
  `;

  hasilEl.innerHTML = `
    <div class="text-center">
      <svg class="animate-spin h-12 w-12 text-green-600 mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
      </svg>
      <p class="text-gray-600 font-medium">Menghitung Z-Score...</p>
      <p class="text-gray-400 text-sm mt-1">Mohon tunggu sebentar</p>
    </div>
  `;

  const formData = {
    umur: umur,
    tinggi: tinggi,
    jenis_kelamin: jenis_kelamin
  };

  try {
    const res = await fetch('/hitung-zscore', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
      },
      body: JSON.stringify(formData)
    });

    if (!res.ok) {
      let errorMsg = 'Terjadi kesalahan pada server';
      try {
        const errorData = await res.json();
        if (errorData.errors) {
          // Validation errors
          errorMsg = Object.values(errorData.errors).flat().join(', ');
        } else if (errorData.error) {
          errorMsg = errorData.error;
        }
      } catch (e) {
        errorMsg = `Error ${res.status}: ${res.statusText}`;
      }

      hasilEl.innerHTML = `
        <div class="text-center">
          <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </div>
          <h3 class="text-red-600 font-semibold text-lg mb-2">Gagal Menghitung</h3>
          <p class="text-gray-600 text-sm">${errorMsg}</p>
        </div>
      `;
      return;
    }

    const data = await res.json();

    // Determine color and icon based on category
    let bgColor, textColor, iconColor, icon, message;
    
    if (data.kategori === "Normal") {
      bgColor = "bg-green-100";
      textColor = "text-green-600";
      iconColor = "text-green-600";
      icon = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />`;
      message = "Pertumbuhan anak dalam kondisi baik! 🎉";
    } else if (data.kategori === "Tall" || data.kategori === "Very Tall") {
      bgColor = "bg-blue-100";
      textColor = "text-blue-600";
      iconColor = "text-blue-600";
      icon = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />`;
      message = "Tinggi badan anak di atas rata-rata";
    } else if (data.kategori === "Stunting") {
      bgColor = "bg-yellow-100";
      textColor = "text-yellow-600";
      iconColor = "text-yellow-600";
      icon = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />`;
      message = "Perlu perhatian khusus untuk nutrisi anak";
    } else if (data.kategori === "Severe Stunting") {
      bgColor = "bg-red-100";
      textColor = "text-red-600";
      iconColor = "text-red-600";
      icon = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />`;
      message = "Segera konsultasi dengan tenaga kesehatan!";
    } else {
      bgColor = "bg-gray-100";
      textColor = "text-gray-600";
      iconColor = "text-gray-600";
      icon = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />`;
      message = "Status pertumbuhan anak";
    }

    hasilEl.innerHTML = `
      <div class="text-center space-y-4 animate-[fadeUp_.5s_ease-out]">
        <div class="w-20 h-20 ${bgColor} rounded-full flex items-center justify-center mx-auto shadow-sm">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 ${iconColor}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            ${icon}
          </svg>
        </div>
        <div>
          <p class="text-sm text-gray-500 mb-1">Hasil untuk <strong>${nama}</strong></p>
          <h3 class="text-2xl font-bold ${textColor} mb-2">${data.kategori}</h3>
          <div class="inline-block px-4 py-2 bg-gray-50 rounded-lg">
            <p class="text-sm text-gray-500">Z-Score</p>
            <p class="text-3xl font-extrabold text-gray-800">${data.z_score}</p>
          </div>
        </div>
        <p class="text-gray-600 text-sm leading-relaxed max-w-xs mx-auto">${message}</p>
        ${data.kategori !== "Normal" ? `
          <a href="/rekomendasi" class="inline-block mt-4 px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg text-sm font-medium transition">
            Lihat Rekomendasi Makanan
          </a>
        ` : ''}
      </div>
    `;

  } catch (err) {
    hasilEl.innerHTML = `
      <div class="text-center">
        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>
        <h3 class="text-red-600 font-semibold text-lg mb-2">Kesalahan Jaringan</h3>
        <p class="text-gray-600 text-sm">Tidak dapat terhubung ke server. Periksa koneksi internet Anda.</p>
        <p class="text-gray-400 text-xs mt-2">${err.message}</p>
      </div>
    `;
    console.error(err);
  } finally {
    // Re-enable button
    submitBtn.disabled = false;
    submitBtn.innerHTML = 'Hitung Z-Score';
  }
}

function showError(fieldId, message) {
  const field = document.getElementById(fieldId);
  field.classList.add('border-red-500', 'ring-red-200');
  
  // Add error message below field
  const errorDiv = document.createElement('p');
  errorDiv.className = 'text-red-500 text-xs mt-1 error-message';
  errorDiv.textContent = message;
  field.parentNode.appendChild(errorDiv);
}

function clearErrors() {
  // Remove error styling
  document.querySelectorAll('input, select').forEach(el => {
    el.classList.remove('border-red-500', 'ring-red-200');
  });
  
  // Remove error messages
  document.querySelectorAll('.error-message').forEach(el => el.remove());
}
</script>




{{-- ========== FADE UP KEYFRAME ========== --}}
<style>
@keyframes fadeUp {
    0% { opacity: 0; transform: translateY(14px); }
    100% { opacity: 1; transform: translateY(0); }
}
</style>

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endsection
