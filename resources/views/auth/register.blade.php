@extends('layouts.auth')
@section('title', 'Register')
@section('content')
<div class="w-full max-w-[520px] mx-auto p-10 rounded-2xl border border-[#e0d8cc] bg-[#f9f6f1] shadow-lg text-[#3b3027]">
    <h2 class="text-3xl font-bold text-[#5b402a] text-center mb-6">REGISTER</h2>
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
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <input name="firstname" value="{{ old('firstname') }}" placeholder="First Name"
            class="w-full mb-3 p-3 rounded-lg border border-[#d9d0c3] bg-white text-[#3b3027] placeholder:text-[#8a7b6d] focus:border-[#5b402a] focus:ring-1 focus:ring-[#5b402a] outline-none">
        <input name="lastname" value="{{ old('lastname') }}" placeholder="Last Name"
            class="w-full mb-3 p-3 rounded-lg border border-[#d9d0c3] bg-white text-[#3b3027] placeholder:text-[#8a7b6d] focus:border-[#5b402a] focus:ring-1 focus:ring-[#5b402a] outline-none">
        <input type="date" name="birthday" value="{{ old('birthday') }}"
            class="w-full mb-3 p-3 rounded-lg border border-[#d9d0c3] bg-white text-[#3b3027] focus:border-[#5b402a] focus:ring-1 focus:ring-[#5b402a] outline-none">
        <input name="address" value="{{ old('address') }}" placeholder="Address"
            class="w-full mb-3 p-3 rounded-lg border border-[#d9d0c3] bg-white text-[#3b3027] placeholder:text-[#8a7b6d] focus:border-[#5b402a] focus:ring-1 focus:ring-[#5b402a] outline-none">
        <input name="contactno" value="{{ old('contactno') }}" placeholder="Contact No"
            class="w-full mb-3 p-3 rounded-lg border border-[#d9d0c3] bg-white text-[#3b3027] placeholder:text-[#8a7b6d] focus:border-[#5b402a] focus:ring-1 focus:ring-[#5b402a] outline-none">
        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email"
            class="w-full mb-3 p-3 rounded-lg border border-[#d9d0c3] bg-white text-[#3b3027] placeholder:text-[#8a7b6d] focus:border-[#5b402a] focus:ring-1 focus:ring-[#5b402a] outline-none">
        <input type="password" name="password" placeholder="Password"
            class="w-full mb-3 p-3 rounded-lg border border-[#d9d0c3] bg-white text-[#3b3027] placeholder:text-[#8a7b6d] focus:border-[#5b402a] focus:ring-1 focus:ring-[#5b402a] outline-none">
        <input type="password" name="password_confirmation" placeholder="Confirm Password"
            class="w-full mb-5 p-3 rounded-lg border border-[#d9d0c3] bg-white text-[#3b3027] placeholder:text-[#8a7b6d] focus:border-[#5b402a] focus:ring-1 focus:ring-[#5b402a] outline-none">
        <button type="submit" class="w-full bg-[#5b402a] hover:bg-[#4a331f] text-white font-bold py-3 rounded-lg transition">
            CREATE ACCOUNT
        </button>
    </form>
    <p class="text-center text-sm mt-6 text-[#6f6256]">
        Already have an account?
        <a href="{{ route('login') }}" class="text-[#5b402a] font-medium hover:underline">Login</a>
    </p>
</div>
@endsection