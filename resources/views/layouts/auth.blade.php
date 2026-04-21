<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Auth')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="relative h-screen w-screen overflow-hidden text-white">

    {{-- BACKGROUND --}}
    <div class="absolute inset-0 bg-[url('/images/bg-login.jpg')] bg-cover bg-center"></div>

    {{-- DARK OVERLAY --}}
    <div class="absolute inset-0 bg-black/70"></div>

    {{-- PAGE CONTENT --}}
    <div class="relative z-10 flex items-center justify-center h-full">
        @yield('content')
    </div>

</body>
</html>