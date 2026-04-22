<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f6f3ee] text-[#3b3027] min-h-screen">

    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        <aside class="w-50 bg-[#ece7de] border-r border-[#ddd5c9] flex flex-col">
            <div class="h-14 px-6 flex items-center border-b border-[#ddd5c9] font-bold text-lg">
                Register and Login System 
            </div>

            <nav class="p-4 space-y-2 text-sm">
                <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded-lg hover:bg-[#ded5c7]">
                    Dashboard
                </a>
                @php $authUser = auth()->user(); @endphp
                @if($authUser && ($authUser->is_admin || $authUser->email === 'jimenezchristianaugustus@gmail.com'))
                    <a href="{{ route('users.index') }}" class="block px-3 py-2 rounded-lg hover:bg-[#ded5c7]">
                        Registered User
                    </a>
                @endif
            </nav>
            

            <div class="mt-auto p-4 border-t border-[#ddd5c9]">
                <div class="text-xs text-[#7a6d60] mb-2">{{ auth()->user()->firstname }}</div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full bg-[#5b402a] hover:bg-[#4a331f] text-white text-sm px-3 py-2 rounded-lg transition">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        {{-- Main --}}
        <main class="flex-1 min-w-0">
            {{-- Topbar --}}
            <header class="h-16 px-6 border-b border-[#ddd5c9] bg-[#f6f3ee] flex items-center justify-between">
               <div class="text-sm text-[#7a6d60]"></div>
                <div class="w-72">
                </div>
            </header>

            {{-- Page content --}}
            <section class="p-6">
                @yield('content')
            </section>
        </main>
    </div>

</body>
</html>