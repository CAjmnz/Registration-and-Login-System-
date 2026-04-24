<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

@php
    $theme = auth()->check()
        ? auth()->user()->setting->theme ?? 'latte'
        : 'latte';
@endphp

<body class="
    transition-colors duration-300

    @if($theme === 'coldbrew')
        bg-[#1f1a17] text-[#e8ded6]
    @else
        bg-[#f6f1ea] text-[#3b3027]
    @endif
">

<div class="flex min-h-screen">

    {{-- SIDEBAR --}}
    <aside class="
        w-60 flex flex-col border-r

        @if($theme === 'coldbrew')
            bg-[#2a221d] border-[#3a2f28] text-[#e8ded6]
        @else
            bg-[#ece7de] border-[#ddd5c9] text-[#3b3027]
        @endif
    ">

        <h1 class="text-2xl font-bold p-4" style="color:#785736;">
            Registered User System
        </h1>

        <nav class="p-4 space-y-2 text-sm">
            <a href="{{ route('dashboard') }}"
               class="block px-3 py-2 rounded-lg hover:bg-[#785736] hover:text-white">
                Dashboard
            </a>

            @php $authUser = auth()->user(); @endphp

            @if($authUser && ($authUser->is_admin || $authUser->email === 'jimenezchristianaugustus@gmail.com'))
                <a href="{{ route('users.index') }}"
                   class="block px-3 py-2 rounded-lg hover:bg-[#785736] hover:text-white">
                    Registered Users
                </a>
            @endif
        </nav>

        <div class="mt-auto p-4 border-t border-[#3a2f28]">
            <div class="text-xs mb-2">
                {{ auth()->user()->firstname ?? 'Guest' }}
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="w-full bg-[#785736] hover:bg-[#664a30] text-white text-sm px-3 py-2 rounded-lg">
                    Logout
                </button>
            </form>
        </div>

    </aside>

    {{-- MAIN --}}
    <main class="flex-1 min-w-0">

        {{-- TOPBAR --}}
        <header class="
            h-16 px-6 flex items-center justify-between border-b

            @if($theme === 'coldbrew')
                bg-[#2a221d] border-[#3a2f28]
            @else
                bg-[#f6f3ee] border-[#ddd5c9]
            @endif
        ">
            <div></div>
        </header>

        {{-- CONTENT --}}
        <section class="p-6">
            @yield('content')
        </section>

    </main>
</div>

</body>
</html>