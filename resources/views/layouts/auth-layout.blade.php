<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Cegah Stunting</title>

    {{-- Tailwind CDN with Dark Mode Config --}}
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
</head>

<body class="bg-gray-100 dark:bg-gray-900 transition-colors duration-300">

    {{-- HANYA CONTENT, TANPA NAVBAR & FOOTER --}}
    @yield('content')

    {{-- Dark Mode Toggle --}}
    @include('components.dark-mode-toggle')

</body>
</html>
