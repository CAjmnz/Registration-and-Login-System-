@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="w-[420px] p-10 rounded-2xl border border-white/20 bg-white/10 backdrop-blur-md shadow-xl">

    <h1 class="text-3xl font-bold text-yellow-400 text-center mb-6">LOGIN</h1>

@if ($errors->any())
    <div 
        id="errorAlert"
        class="bg-red-500 text-white p-3 mb-4 text-sm rounded transition-opacity duration-500"
    >
        {{ $errors->first() }}
    </div>

    <script>
        setTimeout(() => {
            const alert = document.getElementById('errorAlert');

            if (alert) {
                // Fade out
                alert.style.opacity = '0';

                // Refresh page after fade
                setTimeout(() => {
                    location.reload();
                }, 500);
            }
        }, 3000); // 3 seconds
    </script>
@endif

    <form method="POST" action="/login">
        @csrf
        <input type="email" name="email" placeholder="Email"
            class="w-full mb-4 p-3 bg-transparent border border-white/30 text-white focus:border-yellow-400 outline-none">
        <input type="password" name="password" placeholder="Password"
            class="w-full mb-6 p-3 bg-transparent border border-white/30 text-white focus:border-yellow-400 outline-none">
        <button class="w-full bg-yellow-400 text-black font-bold py-3 hover:bg-yellow-500 transition">
            LOGIN
        </button>
    </form>

    <p class="text-center text-sm mt-6 text-white/70">
        No account? <a href="/register" class="text-yellow-400 hover:underline">Register</a>
    </p>

</div>
@endsection
