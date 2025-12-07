<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>StuntingCare - User Panel</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white overflow-x-hidden"> 

{{-- NAVBAR INCLUDE --}}
@include('components.navbar')

{{-- PAGE CONTENT --}}
<main class="container mx-auto px-6 py-0">
    @yield('content')
</main>

</body>
</html>
