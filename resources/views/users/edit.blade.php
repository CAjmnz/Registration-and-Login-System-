@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<div class="w-full max-w-[520px] mx-auto p-10 rounded-2xl border border-[#e0d8cc] bg-[#f9f6f1] shadow-lg text-[#3b3027]">

    <h2 class="text-3xl font-bold text-yellow-400 text-center mb-6">EDIT USER</h2>

    @if ($errors->any())
        <div class="bg-red-500 text-white p-3 mb-4 text-sm rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('users.update', $user) }}">
        @csrf
        @method('PUT')
        <input name="firstname" value="{{ old('firstname', $user->firstname) }}" placeholder="First Name"
        class="w-full mb-3 p-3 rounded-lg border border-[#d9d0c3] bg-white text-[#3b3027] placeholder:text-[#8a7b6d] focus:border-[#5b402a] focus:ring-1 focus:ring-[#5b402a] outline-none">
        <input name="lastname" value="{{ old('lastname', $user->lastname) }}" placeholder="Last Name"
        class="w-full mb-3 p-3 rounded-lg border border-[#d9d0c3] bg-white text-[#3b3027] placeholder:text-[#8a7b6d] focus:border-[#5b402a] focus:ring-1 focus:ring-[#5b402a] outline-none">
        <input type="date" name="birthday" value="{{ old('birthday', optional($user->birthday)->format('Y-m-d')) }}"
        class="w-full mb-3 p-3 rounded-lg border border-[#d9d0c3] bg-white text-[#3b3027] placeholder:text-[#8a7b6d] focus:border-[#5b402a] focus:ring-1 focus:ring-[#5b402a] outline-none">
        <input name="contactno" value="{{ old('contactno', $user->contactno) }}" placeholder="Contact No"
        class="w-full mb-3 p-3 rounded-lg border border-[#d9d0c3] bg-white text-[#3b3027] placeholder:text-[#8a7b6d] focus:border-[#5b402a] focus:ring-1 focus:ring-[#5b402a] outline-none">
        <input name="email" value="{{ old('email', $user->email) }}" placeholder="Email"
        class="w-full mb-3 p-3 rounded-lg border border-[#d9d0c3] bg-white text-[#3b3027] placeholder:text-[#8a7b6d] focus:border-[#5b402a] focus:ring-1 focus:ring-[#5b402a] outline-none">
        <input type="password" name="password" placeholder="New Password (optional)"
        class="w-full mb-3 p-3 rounded-lg border border-[#d9d0c3] bg-white text-[#3b3027] placeholder:text-[#8a7b6d] focus:border-[#5b402a] focus:ring-1 focus:ring-[#5b402a] outline-none">
        <input type="password" name="password_confirmation" placeholder="Confirm New Password"
        class="w-full mb-3 p-3 rounded-lg border border-[#d9d0c3] bg-white text-[#3b3027] placeholder:text-[#8a7b6d] focus:border-[#5b402a] focus:ring-1 focus:ring-[#5b402a] outline-none">
        <button class="w-full bg-[#5b402a] hover:bg-[#4a331f] text-white font-bold py-3 rounded-lg transition">
            UPDATE USER
        </button>
    </form>
</div>
@endsection