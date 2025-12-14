<nav class="fixed top-0 left-0 w-full z-50 bg-white/70 backdrop-blur-xl border-b border-gray-200/40 shadow-sm">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-2 md:px-0 h-[72px]">

        {{-- LOGO --}}
        <div class="flex items-center gap-3">
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
            <span class="text-2xl font-extrabold tracking-tight bg-clip-text text-transparent
                         bg-gradient-to-r from-green-500 to-blue-500">
                StuntingCare
            </span>
        </div>

        {{-- MENU CENTER (desktop) --}}
        <ul class="hidden md:flex items-center gap-10 font-medium text-gray-700 absolute left-1/2 -translate-x-1/2">
            <li><a href="#beranda" class="hover:text-green-600 transition">Beranda</a></li>
            <li><a href="#fitur" class="hover:text-green-600 transition">Fitur</a></li>
            <li><a href="#tentang" class="hover:text-green-600 transition">Tentang</a></li>
            <li><a href="#tujuan" class="hover:text-green-600 transition">Tujuan</a></li>
        </ul>

        {{-- BUTTON LOGIN --}}
        <div>
            <a href="/login"
               class="px-5 py-2.5 rounded-xl border border-green-600 text-green-700 font-semibold
                      bg-white hover:bg-green-50 transition shadow-sm">
                Login
            </a>
        </div>

    </div>
</nav>
