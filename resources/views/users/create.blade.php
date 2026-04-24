C
@extends('layouts.auth')

@section('title', 'Add User')

@section('content')
<div class="w-full max-w-[520px] mx-auto p-10 rounded-2xl border border-[#e0d8cc] bg-[#f9f6f1] shadow-lg text-[#3b3027]">

    <h2 class="text-3xl font-bold text-yellow-400 text-center mb-6">ADD USER</h2>

    @if ($errors->any())
    <div id="errorAlert" class="bg-red-500 text-white p-3 mb-4 text-sm rounded transition-opacity duration-500">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

    <script>
        setTimeout(() => {
            const alert = document.getElementById('errorAlert');
            if (alert) {
                alert.style.opacity = '0';
                setTimeout(() => {
                    alert.remove();
                }, 200);
            }
        }, 3000);
    </script>
@endif
   <form method="POST" action="{{ route('users.store') }}">
    @csrf

    <input name="firstname" value="{{ old('firstname') }}" placeholder="First Name"
    class="w-full mb-3 p-3 rounded-lg border border-[#d9d0c3] bg-white text-[#3b3027]">

    <input name="lastname" value="{{ old('lastname') }}" placeholder="Last Name"
    class="w-full mb-3 p-3 rounded-lg border border-[#d9d0c3] bg-white text-[#3b3027]">

    <input type="date" name="birthday" value="{{ old('birthday') }}"
    class="w-full mb-3 p-3 rounded-lg border border-[#d9d0c3] bg-white text-[#3b3027]">

    <input name="address" value="{{ old('address') }}" placeholder="Address"
    class="w-full mb-3 p-3 rounded-lg border border-[#d9d0c3] bg-white text-[#3b3027]">

    <input name="contactno" value="{{ old('contactno') }}" placeholder="Contact Number"
    class="w-full mb-3 p-3 rounded-lg border border-[#d9d0c3] bg-white text-[#3b3027]">

    <input name="email" value="{{ old('email') }}" placeholder="Email"
    class="w-full mb-3 p-3 rounded-lg border border-[#d9d0c3] bg-white text-[#3b3027]">

    <input type="password" name="password" placeholder="Password"
    class="w-full mb-3 p-3 rounded-lg border border-[#d9d0c3] bg-white text-[#3b3027]">

    <input type="password" name="password_confirmation" placeholder="Confirm Password"
    class="w-full mb-3 p-3 rounded-lg border border-[#d9d0c3] bg-white text-[#3b3027]">

    <button class="w-full bg-[#5b402a] text-white font-bold py-3 rounded-lg">
        CREATE ACCOUNT
    </button>
</form>
</div>
@endsection