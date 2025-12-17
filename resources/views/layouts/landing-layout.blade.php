<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Cegah Stunting' }}</title>

    {{-- Tailwind CDN with Dark Mode Config --}}
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-200 font-inter transition-colors duration-300">

    {{-- Navbar khusus landing --}}
    @include('components.navbar-landing')

    <main>
        @yield('content')
    </main>
    
    @include('components.footer')

    <script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener("click", function(e) {
            e.preventDefault();
            document.querySelector(this.getAttribute("href")).scrollIntoView({
                behavior: "smooth"
            });
        });
    });
</script>

{{-- Dark Mode Toggle --}}
@include('components.dark-mode-toggle')

</body>
</html>
