@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<div class="w-[520px] p-10 rounded-2xl border border-white/20 bg-white/10 backdrop-blur-md shadow-xl">

    <h2 class="text-3xl font-bold text-yellow-400 text-center mb-6">REGISTER</h2>

    @if ($errors->any())
        <div class="bg-red-500 text-white p-3 mb-4 text-sm rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/register">
        @csrf
        <input name="firstname" placeholder="First Name"
            class="w-full mb-3 p-3 bg-transparent border border-white/30 text-white focus:border-yellow-400 outline-none">
        <input name="lastname" placeholder="Last Name"
            class="w-full mb-3 p-3 bg-transparent border border-white/30 text-white focus:border-yellow-400 outline-none">
        <input type="date" name="birthday"
            class="w-full mb-3 p-3 bg-transparent border border-white/30 text-white focus:border-yellow-400 outline-none">
        <input name="address" placeholder="Address"
            class="w-full mb-3 p-3 bg-transparent border border-white/30 text-white focus:border-yellow-400 outline-none">
        <input name="contactno" placeholder="Contact No"
            class="w-full mb-3 p-3 bg-transparent border border-white/30 text-white focus:border-yellow-400 outline-none">
        <input name="email" placeholder="Email"
            class="w-full mb-3 p-3 bg-transparent border border-white/30 text-white focus:border-yellow-400 outline-none">
        <input type="password" name="password" placeholder="Password"
            class="w-full mb-5 p-3 bg-transparent border border-white/30 text-white focus:border-yellow-400 outline-none">
        <button class="w-full bg-yellow-400 text-black font-bold py-3 hover:bg-yellow-500 transition">
            CREATE ACCOUNT
        </button>
    </form>

    <p class="text-center text-sm mt-6 text-white/70">
        Already have an account? <a href="/login" class="text-yellow-400 hover:underline">Login</a>
    </p>

</div>
@endsection