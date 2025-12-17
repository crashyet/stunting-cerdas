<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cegah Stunting - User Panel</title>
    
    {{-- Tailwind CDN with Dark Mode Config --}}
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
</head>

<body class="bg-white dark:bg-gray-900 overflow-x-hidden transition-colors duration-300">

{{-- SIDEBAR / NAVBAR --}}
@include('components.navbar')

{{-- CONTENT (SATU KALI SAJA) --}}
<main id="mainContent"
      class="ml-64 transition-all duration-300">

    @yield('content')

</main>

{{-- Dark Mode Toggle --}}
@include('components.dark-mode-toggle')

</body>
</html>
