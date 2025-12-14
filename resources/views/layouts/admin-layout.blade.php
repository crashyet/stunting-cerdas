<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Admin')</title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        /* Sidebar collapse */
        .sidebar.collapsed {
            width: 70px !important;
            padding-left: 15px !important;
            padding-right: 15px !important;
        }

        .sidebar.collapsed .sidebar-text {
            display: none !important;
        }

        .sidebar.collapsed a {
            justify-content: center !important;
        }
    </style>
</head>

<body class="bg-gray-100 flex">

    {{-- SIDEBAR DIPANGGIL DARI VIEW YANG EXTEND --}}
    @yield('sidebar')

    {{-- MAIN CONTENT --}}
    <main id="content" class="flex-1 p-8 ml-64 transition-all duration-300">
        @yield('content')
    </main>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');

            sidebar.classList.toggle('collapsed');

            if (sidebar.classList.contains('collapsed')) {
                content.style.marginLeft = "80px";
            } else {
                content.style.marginLeft = "260px";
            }
        }
    </script>

    
</body>
</html>
