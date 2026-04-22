<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Auth')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="relative h-screen w-screen overflow-hidden text-[#3b3027]">

    {{-- WHITE BACKGROUND --}}
    <div class="absolute inset-0 bg-white"></div>

    {{-- PAGE CONTENT --}}
    <div class="relative z-10 flex items-center justify-center h-full">
        @yield('content')
    </div>

</body>
</html>