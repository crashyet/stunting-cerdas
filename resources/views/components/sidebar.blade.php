<div id="sidebar"
     class="sidebar w-64 bg-white dark:bg-gray-800 h-screen shadow-xl fixed left-0 top-0 p-6 transition-all duration-300 z-50">

    {{-- HEADER --}}
    <div class="flex items-center justify-between mb-4">

        <div class="flex items-center gap-3 sidebar-text">
            <div class="w-10 h-10 rounded-xl bg-green-100 dark:bg-green-900 flex items-center justify-center">
                <i class="fa-solid fa-user text-green-600 dark:text-green-400 text-[18px]"></i>
            </div>

            <h1 class="text-[16px] font-bold text-green-600 dark:text-green-400">Admin</h1>
        </div>

        <button onclick="toggleSidebar()" class="text-gray-600 dark:text-gray-300 hover:text-green-600 dark:hover:text-green-400 transition">
            <i class="fa-solid fa-bars text-[18px]"></i>
        </button>
    </div>

    {{-- Garis --}}
    <div class="w-full h-[1px] bg-gray-200 dark:bg-gray-700 mt-2 mb-4"></div>


    {{-- MENU --}}
    <ul class="space-y-2 text-gray-700 dark:text-gray-300 text-[15px]">

        {{-- Dashboard --}}
        <li>
            <a href="/admin/dashboard"
               class="flex items-center gap-3 p-3 rounded-xl transition
               {{ request()->is('admin/dashboard')
                    ? 'bg-green-600 dark:bg-green-700 text-white shadow-md'
                    : 'hover:bg-green-50 dark:hover:bg-gray-700' }}">

                <i class="fa-solid fa-gauge text-[17px]"></i>
                <span class="sidebar-text">Dashboard</span>
            </a>
        </li>

        {{-- Konten Edukasi --}}
        <li>
            <a href="/admin/konten-edukasi"
               class="flex items-center gap-3 p-3 rounded-xl transition
               {{ request()->is('admin/konten-edukasi')
                    ? 'bg-green-600 dark:bg-green-700 text-white shadow-md'
                    : 'hover:bg-green-50 dark:hover:bg-gray-700' }}">

                <i class="fa-solid fa-book-open text-[17px]"></i>
                <span class="sidebar-text">Konten Edukasi</span>
            </a>
        </li>

        {{-- Rekomendasi Makanan --}}
        <li>
            <a href="/admin/rekomendasi-makanan"
               class="flex items-center gap-3 p-3 rounded-xl transition
               {{ request()->is('admin/rekomendasi-makanan')
                    ? 'bg-green-600 dark:bg-green-700 text-white shadow-md'
                    : 'hover:bg-green-50 dark:hover:bg-gray-700' }}">

                <i class="fa-solid fa-utensils text-[17px]"></i>
                <span class="sidebar-text">Rekomendasi Makanan</span>
            </a>
        </li>

        {{-- Data Cek Stunting --}}
        <li>
            <a href="/admin/cek-stunting"
               class="flex items-center gap-3 p-3 rounded-xl transition
               {{ request()->is('admin/cek-stunting')
                    ? 'bg-green-600 dark:bg-green-700 text-white shadow-md'
                    : 'hover:bg-green-50 dark:hover:bg-gray-700' }}">

                <i class="fa-solid fa-heart-pulse text-[17px]"></i>
                <span class="sidebar-text">Data Cek Stunting</span>
            </a>
        </li>

        {{-- Data Cek Gizi --}}
        <li>
            <a href="/admin/cek-gizi"
               class="flex items-center gap-3 p-3 rounded-xl transition
               {{ request()->is('admin/cek-gizi')
                    ? 'bg-green-600 dark:bg-green-700 text-white shadow-md'
                    : 'hover:bg-green-50 dark:hover:bg-gray-700' }}">

                <i class="fa-solid fa-apple-whole text-[17px]"></i>
                <span class="sidebar-text">Data Cek Gizi</span>
            </a>
        </li>

        {{-- Manajemen User --}}
        <li>
            <a href="/admin/manajemen-user"
               class="flex items-center gap-3 p-3 rounded-xl transition
               {{ request()->is('admin/manajemen-user')
                    ? 'bg-green-600 dark:bg-green-700 text-white shadow-md'
                    : 'hover:bg-green-50 dark:hover:bg-gray-700' }}">

                <i class="fa-solid fa-users text-[17px]"></i>
                <span class="sidebar-text">Manajemen User</span>
            </a>
        </li>

    </ul>

    {{-- BOTTOM BUTTON --}}
    <div class="absolute bottom-6 left-0 w-full px-4">
        <a href="/"
           class="flex items-center gap-2 p-3 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-xl 
                  text-gray-700 dark:text-gray-300 transition sidebar-text text-[15px]">

            <i class="fa-solid fa-arrow-left text-[16px]"></i>
            <span>Kembali ke Beranda</span>
        </a>
    </div>

</div>
