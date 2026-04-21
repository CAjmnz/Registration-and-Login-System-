@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="flex items-center justify-center h-screen">
    <div class="w-[420px] p-10 rounded-2xl border border-white/20 bg-white/10 backdrop-blur-md shadow-xl text-white">

        <h1 class="text-3xl font-bold text-yellow-400 text-center mb-6">DASHBOARD</h1>

        <div class="mb-4 p-4 border border-white/20 rounded-xl bg-white/5 space-y-2">
            <p><span class="text-white/60 text-sm">Welcome</span><br>
                <span class="font-semibold">{{ auth()->user()->firstname ?? 'User' }}</span>
            </p>
            <p><span class="text-white/60 text-sm">Email</span><br>
                <span class="font-semibold">{{ auth()->user()->email }}</span>
            </p>
            <p><span class="text-white/60 text-sm">Contact</span><br>
                <span class="font-semibold">{{ auth()->user()->contactno }}</span>
            </p>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

        </form>

    </div>
</div>
@endsection