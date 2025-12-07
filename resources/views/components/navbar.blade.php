@php
    $active = [
        'beranda'     => Request::is('/'),
        'edukasi'     => Request::is('edukasi') || Request::is('edukasi/*'),
        'cek'         => Request::is('cek-stunting') || Request::is('cek-stunting/*'),
        'rekomendasi' => Request::is('rekomendasi') || Request::is('rekomendasi/*'),
        'dataanak'    => Request::is('data-anak') || Request::is('data-anak/*'),
        'dashboard'   => Request::is('dashboard') || Request::is('dashboard/*'),
    ];

    $pillActive = 'bg-green-600 text-white px-6 py-2 rounded-full shadow font-semibold';
    $pillNormal = 'hover:text-green-600 px-6 py-2 rounded-full';
@endphp


{{-- NAVBAR WITH BLUR --}}
<nav class="sticky top-0 z-50 
    bg-white/20 
    backdrop-blur-lg 
    border-b border-white/30 
    shadow-[0_8px_20px_rgba(0,0,0,0.06)]
    supports-backdrop-blur:bg-white/30">

    <div class="container mx-auto px-20 py-4 flex items-center justify-between relative">

        {{-- LOGO --}}
        <div class="flex items-center gap-3 flex-none">

            {{-- BRAND LOGO SVG (sementara) --}}
            <div class="w-10 h-10 rounded-2xl flex items-center justify-center overflow-hidden">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                <defs>
                    <linearGradient id="brandGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="#34D399"/>   
                        <stop offset="100%" stop-color="#3B82F6"/> 
                    </linearGradient>
                </defs>
                    <rect width="48" height="48" rx="14" fill="url(#brandGradient)"></rect>
                    <path d="M24 14c-5 0-9 4-9 9s4 9 9 9 9-4 9-9-4-9-9-9zm-4 10a1.5 1.5 0 110-3 1.5 1.5 0 010 3zm8 0a1.5 1.5 0 110-3 1.5 1.5 0 010 3zm-4 5c-2.5 0-3.8-1.5-4-2a1 1 0 011.8-.9c.1.2.8.9 2.2.9s2-.7 2.2-.9a1 1 0 011.8.9c-.3.5-1.5 2-4 2z"
                        fill="white"/>
                </svg>
            </div>

            <h1 class="text-xl font-bold tracking-tight leading-none mt-0.5">
                <span class="text-green-600">Stunting</span>
                <span class="text-blue-500">Care</span>
            </h1>
        </div>

        {{-- MENU CENTER FIXED --}}
        <ul class="hidden md:flex gap-0 text-slate-600 font-medium text-sm absolute left-1/2 -translate-x-[50%] whitespace-nowrap items-center ml-10">

            <li><a href="/edukasi" class="{{ $active['edukasi'] ? $pillActive : $pillNormal }}">Edukasi</a></li>
            <li><a href="/cek-stunting" class="{{ $active['cek'] ? $pillActive : $pillNormal }}">Cek Stunting</a></li>
            <li><a href="/rekomendasi" class="{{ $active['rekomendasi'] ? $pillActive : $pillNormal }}">Rekomendasi</a></li>
            <li><a href="/data-anak" class="{{ $active['dataanak'] ? $pillActive : $pillNormal }}">Data Anak</a></li>
            <li><a href="/dashboard" class="{{ $active['dashboard'] ? $pillActive : $pillNormal }}">Dashboard</a></li>

        </ul>

        {{-- AVATAR AREA --}}
        <div class="flex items-center gap-5 flex-none pr-2">

            <div class="relative">
                <button onclick="toggleMenu()">
                    
                    {{-- USER AVATAR SVG (sementara) --}}
                    <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                             fill="none" viewBox="0 0 24 24" stroke="currentColor"
                             class="w-6 h-6 text-gray-600">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zM6 20v-1c0-2.67 3.33-4 6-4s6 1.33 6 4v1" />
                        </svg>
                    </div>

                </button>

                <div id="profileMenu"
                     class="hidden absolute right-0 mt-3 bg-white shadow-lg rounded-lg w-44 py-2">
                    <a href="/" class="block px-4 py-2 hover:bg-gray-100">Landing Page</a>

                    <form action="/logout" method="POST">@csrf
                        <button class="block w-full text-left px-4 py-2 hover:bg-gray-100 text-red-600">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>


<script>
function toggleMenu() {
    document.getElementById('profileMenu').classList.toggle('hidden');
}

document.addEventListener('click', function(e) {
    const menu = document.getElementById('profileMenu');
    const btn = menu.previousElementSibling;
    if (!menu.contains(e.target) && !btn.contains(e.target)) {
        menu.classList.add('hidden');
    }
});
</script>
