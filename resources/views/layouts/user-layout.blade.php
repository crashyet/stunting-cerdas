<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StuntingCare - User Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white overflow-x-hidden">

{{-- SIDEBAR / NAVBAR --}}
@include('components.navbar')

{{-- CONTENT (SATU KALI SAJA) --}}
<main id="mainContent"
      class="ml-64 transition-all duration-300">

    @yield('content')

</main>

</body>
</html>
