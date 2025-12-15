@php
    $active = [
        'beranda'     => Request::is('/'),
        'edukasi'     => Request::is('edukasi') || Request::is('edukasi/*'),
        'cek'         => Request::is('cek-stunting') || Request::is('cek-stunting/*'),
        'rekomendasi' => Request::is('rekomendasi') || Request::is('rekomendasi/*'),
        'dataanak'    => Request::is('data-anak') || Request::is('data-anak/*'),
        'dashboard'   => Request::is('dashboard') || Request::is('dashboard/*'),
    ];
@endphp

{{-- ================= SIDEBAR ================= --}}
<div id="sidebar" class="sidebar w-64 bg-white h-screen shadow-xl fixed left-0 top-0 z-50">

    {{-- HEADER --}}
    <div class="sidebar-header flex items-center justify-between px-6 py-5">
        <div class="flex items-center gap-3 sidebar-text">
            <div class="w-10 h-10 rounded-xl overflow-hidden shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                <defs>
                    <linearGradient id="brandGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="#34D399"/>   
                        <stop offset="100%" stop-color="#3B82F6"/> 
                    </linearGradient>
                </defs>
                    <rect width="48" height="48" rx="14" fill="url(#brandGradient)"></rect>
                    <path d="M24 14c-5 0-9 4-9 9s4 9 9 9 9-4 9-9-4-9-9-9zm-4 10a1.5 1.5 0 110-3 1.5 1.5 0 010 3zm8 
                            0a1.5 1.5 0 110-3 1.5 1.5 0 010 3zm-4 5c-2.5 0-3.8-1.5-4-2a1 1 0 011.8-.9c.1.2.8.9 2.2.9s2-.7 
                            2.2-.9a1 1 0 011.8.9c-.3.5-1.5 2-4 2z"
                        fill="white"/>
                </svg>
            </div>
            <h1 class="text-lg font-bold whitespace-nowrap">
                <span class="text-green-600">Cegah</span>
                <span class="text-blue-500">Stunting</span>
            </h1>
        </div>

        <button onclick="toggleSidebar()" class="text-gray-600 hover:text-green-600">
            ☰
        </button>
    </div>

    <div class="h-px bg-gray-200 mx-6 mb-4"></div>

    {{-- MENU --}}
    <ul class="space-y-2 px-3 text-sm text-gray-700">

        <li>
            <a href="/edukasi" class="menu-item {{ $active['edukasi'] ? 'active' : '' }}">
                <svg class="icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M12 6l7 4-7 4-7-4 7-4z"/>
                    <path d="M5 10v6l7 4 7-4v-6"/>
                </svg>
                <span class="sidebar-text">Edukasi</span>
            </a>
        </li>

        <li>
            <a href="/cek-stunting" class="menu-item {{ $active['cek'] ? 'active' : '' }}">
                <svg class="icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M4.5 12.5l5 5 10-10"/>
                    <circle cx="12" cy="12" r="9"/>
                </svg>
                <span class="sidebar-text">Cek Stunting</span>
            </a>
        </li>

        <li>
            <a href="/rekomendasi" class="menu-item {{ $active['rekomendasi'] ? 'active' : '' }}">
                <svg class="icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="7"/>
                    <path d="M8 4v6M10 4v6M9 10v10"/>
                </svg>
                <span class="sidebar-text">Rekomendasi</span>
            </a>
        </li>

        <li>
            <a href="{{ route('user.deteksi.makanan') }}"
               class="menu-item {{ request()->routeIs('user.deteksi.makanan') ? 'active' : '' }}">
                <svg class="icon" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path d="M3 7h4l2-2h6l2 2h4v12H3V7z"/>
                    <circle cx="12" cy="13" r="3"/>
                </svg>
                <span class="sidebar-text">Deteksi Makanan</span>
            </a>
        </li>

        <li>
            <a href="/data-anak" class="menu-item {{ $active['dataanak'] ? 'active' : '' }}">
                <svg class="icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="8" r="4"/>
                    <path d="M6 20v-1c0-3 12-3 12 0v1"/>
                </svg>
                <span class="sidebar-text">Data Anak</span>
            </a>
        </li>

        <li>
            <a href="/dashboard" class="menu-item {{ $active['dashboard'] ? 'active' : '' }}">
                <svg class="icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M3 3h7v7H3zM14 3h7v11h-7zM14 18h7v3h-7zM3 14h7v7H3z"/>
                </svg>
                <span class="sidebar-text">Dashboard</span>
            </a>
        </li>
    </ul>

    {{-- PROFIL --}}
    <div class="bottom-profile absolute bottom-6 left-0 w-full px-1">
        <button class="menu-item">
            <div class="profile-avatar">
                <i class="fa-solid fa-user text-gray-600"></i>
            </div>
            <span class="sidebar-text">Profil</span>
        </button>
    </div>
</div>

{{-- ================= STYLE ASLI ================= --}}
<style>
.sidebar.collapsed { width: 69px; }

.sidebar.collapsed .sidebar-text {
    opacity: 0;
    width: 0;
    overflow: hidden;
}

.sidebar-text { transition: .3s ease; }

.menu-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px;
    border-radius: 14px;
    transition: .25s;
}

.menu-item:hover { background: #ecfdf5; }

.menu-item.active {
    background: #16a34a;
    color: #fff;
    box-shadow: 0 6px 18px rgba(22,163,74,.35);
}

.menu-item.active svg { color: #fff; }

.icon {
    width: 20px;
    height: 20px;
    flex-shrink: 0;
}

.sidebar.collapsed .menu-item,
.sidebar.collapsed .bottom-profile .menu-item {
    width: 52px;
    height: 52px;
    padding: 0;
    margin: 0 auto;
    justify-content: center;
}

.sidebar.collapsed .sidebar-header {
    justify-content: center;
    padding-left: 0;
    padding-right: 0;
}

.profile-avatar {
    width: 36px;
    height: 36px;
    border-radius: 9999px;
    background: #e5e7eb;
    display: flex;
    align-items: center;
    justify-content: center;
}

.sidebar.collapsed .menu-item {
    position: relative;
}

.sidebar.collapsed .menu-item.active {
    background: transparent !important;
    box-shadow: none !important;
}

.sidebar.collapsed .menu-item.active::before {
    content: "";
    position: absolute;
    width: 40px;
    height: 50px;
    left: 40%;
    top: 50%;
    transform: translate(-50%, -50%);
    background: #16a34a;
    border-radius: 14px;
    z-index: -1;
}

.bottom-profile .menu-item {
    width: 100%;                 
    display: flex;               
    padding-left: 18px;
    padding-right: 18px;
    box-sizing: border-box;
}


</style>

{{-- ================= SCRIPT ASLI ================= --}}
<script>
document.addEventListener('DOMContentLoaded', () => {
    const sidebar = document.getElementById('sidebar');
    const content = document.getElementById('mainContent');

    const state = localStorage.getItem('sidebar-state');

    if (state === 'closed') {
        sidebar.classList.add('collapsed');

        if (content) {
            content.classList.remove('ml-64');
            content.classList.add('ml-24');
        }
    } else {
        if (content) {
            content.classList.add('ml-64');
            content.classList.remove('ml-24');
        }
    }
});

function toggleSidebar(){
    const sidebar = document.getElementById('sidebar');
    const content = document.getElementById('mainContent');

    const isCollapsed = sidebar.classList.toggle('collapsed');

    if (content) {
        content.classList.toggle('ml-64');
        content.classList.toggle('ml-24');
    }

    localStorage.setItem('sidebar-state', isCollapsed ? 'closed' : 'open');
}
</script>

{{-- ================= TAMBAHAN AMAN (TIDAK MENGUBAH KODE DI ATAS) ================= --}}

<form id="logoutDropdown"
      method="POST"
      action="{{ route('logout') }}"
      class="profile-logout hidden">
    @csrf
    <button type="submit">Logout</button>
</form>

<style>
.profile-logout {
    position: absolute;
    bottom: 72px;
    left: 12px;
    right: 12px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 8px 24px rgba(0,0,0,.12);
    overflow: hidden;
    z-index: 9999;
}

.profile-logout button {
    width: 100%;
    padding: 12px 16px;
    font-size: 14px;
    color: #dc2626;
    background: none;
    border: none;
    text-align: left;
    cursor: pointer;
}

.profile-logout button:hover {
    background: #fee2e2;
}

.bottom-profile .menu-item {
    width: 100%;
    display: flex;
    padding-left: 18px;
    padding-right: 18px;
    box-sizing: border-box;
}

.profile-logout {
    position: absolute;
    bottom: 72px;
    left: 12px;
    right: 12px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 8px 24px rgba(0,0,0,.12);
    overflow: hidden;
    z-index: 9999;
    display: none; /* penting: tidak otomatis muncul */
}

</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const profile = document.querySelector('.bottom-profile');
    const logout  = document.getElementById('logoutDropdown');

    if (!profile || !logout) return;

    profile.appendChild(logout);

    profile.addEventListener('mouseenter', () => {
        logout.classList.remove('hidden');
    });

    profile.addEventListener('mouseleave', () => {
        logout.classList.add('hidden');
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const profile = document.querySelector('.bottom-profile');
    const logout  = document.getElementById('logoutDropdown');

    if (!profile || !logout) return;

    profile.appendChild(logout);

    // klik profil → toggle logout
    profile.addEventListener('click', (e) => {
        e.stopPropagation();
        logout.style.display =
            logout.style.display === 'block' ? 'none' : 'block';
    });

    // klik di luar → tutup
    document.addEventListener('click', () => {
        logout.style.display = 'none';
    });
});
</script>

