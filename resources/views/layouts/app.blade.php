<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'App')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="relative min-h-screen w-screen overflow-hidden text-white">

    {{-- BACKGROUND --}}
    <div class="absolute inset-0 bg-[url('/images/bg-login.jpg')] bg-cover bg-center"></div>

    {{-- DARK OVERLAY --}}
    <div class="absolute inset-0 bg-black/70"></div>

    {{-- NAVBAR --}}
    <div class="relative z-20">
        <nav class="border-b border-white/10 bg-black/30 backdrop-blur-md">
            <div class="max-w-7xl mx-auto px-6 flex items-center justify-between h-14">

                {{-- Left --}}
                <div class="flex items-center space-x-4">
                    <a href="/dashboard"
                        class="text-yellow-400 font-bold text-sm hover:text-yellow-300 transition">
                        Dashboard
                    </a>
                    @if(auth()->user()->email === 'jimenezchristianaugustus@gmail.com')
                    <a href="/users"
                        class="text-white/70 text-sm hover:text-yellow-400 transition">
                        Users
                    </a>
                    @endif
                </div>

                {{-- Right --}}
                <div class="flex items-center space-x-4">
                    <span class="text-white/60 text-sm">
                        {{ auth()->user()->firstname }}
                    </span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="bg-red-500 hover:bg-red-600 text-white text-sm px-3 py-1 rounded transition">
                            Logout
                        </button>
                    </form>
                </div>

            </div>
        </nav>
    </div>

    {{-- PAGE CONTENT --}}
    <div class="relative z-10">
        @yield('content')
    </div>

</body>
</html>