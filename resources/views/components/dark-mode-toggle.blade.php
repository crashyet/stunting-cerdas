{{-- Dark Mode Toggle Button --}}
<button id="darkModeToggle" 
        type="button"
        class="fixed bottom-6 right-6 z-[9999] w-14 h-14 rounded-full shadow-lg 
               bg-white dark:bg-gray-800 border-2 border-gray-200 dark:border-gray-700
               flex items-center justify-center
               hover:scale-110 hover:shadow-xl
               cursor-pointer"
        aria-label="Toggle Dark Mode"
        onclick="toggleDarkMode()">
    
    {{-- Sun Icon (visible in dark mode) --}}
    <svg id="sunIcon" class="w-6 h-6 text-yellow-500 hidden" 
         fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
              d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
    </svg>
    
    {{-- Moon Icon (visible in light mode) --}}
    <svg id="moonIcon" class="w-6 h-6 text-gray-700" 
         fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
              d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
    </svg>
</button>

<script>
// Initialize dark mode immediately
(function() {
    const theme = localStorage.getItem('theme') || 'light';
    if (theme === 'dark') {
        document.documentElement.classList.add('dark');
    }
    updateIcons();
})();

// Toggle function
function toggleDarkMode() {
    const html = document.documentElement;
    const isDark = html.classList.contains('dark');
    
    console.log('Toggle clicked! Current mode:', isDark ? 'dark' : 'light');
    
    if (isDark) {
        html.classList.remove('dark');
        localStorage.setItem('theme', 'light');
        console.log('Switched to LIGHT mode');
    } else {
        html.classList.add('dark');
        localStorage.setItem('theme', 'dark');
        console.log('Switched to DARK mode');
    }
    
    console.log('HTML classes:', html.className);
    updateIcons();
    
    // Button animation
    const btn = document.getElementById('darkModeToggle');
    if (btn) {
        btn.style.transform = 'scale(0.9)';
        setTimeout(() => {
            btn.style.transform = 'scale(1)';
        }, 150);
    }
}

// Update icon visibility
function updateIcons() {
    const sunIcon = document.getElementById('sunIcon');
    const moonIcon = document.getElementById('moonIcon');
    const isDark = document.documentElement.classList.contains('dark');
    
    if (sunIcon && moonIcon) {
        if (isDark) {
            sunIcon.classList.remove('hidden');
            moonIcon.classList.add('hidden');
        } else {
            sunIcon.classList.add('hidden');
            moonIcon.classList.remove('hidden');
        }
    }
}

// Update icons when page loads
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', updateIcons);
} else {
    updateIcons();
}
</script>

<style>
#darkModeToggle {
    transition: transform 0.2s ease, box-shadow 0.3s ease, background-color 0.3s ease, border-color 0.3s ease;
}

#darkModeToggle:active {
    transform: scale(0.95) !important;
}
</style>
