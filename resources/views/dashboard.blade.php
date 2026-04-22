@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="space-y-6">
    <div>
        <h1 class="text-2xl font-semibold text-[#3b3027]">Dashboard</h1>
        <p class="text-sm text-[#7a6d60] mt-1">Welcome back, {{ auth()->user()->firstname ?? 'User' }}.</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-[#f9f6f1] border border-[#e0d8cc] rounded-xl p-5">
            <p class="text-xs uppercase tracking-wide text-[#8a7b6d]">Total Users</p>
            <p class="text-3xl font-bold text-[#3b3027] mt-2">{{ \App\Models\User::count() }}</p>
        </div>
        <div class="bg-[#f9f6f1] border border-[#e0d8cc] rounded-xl p-5">
            <p class="text-xs uppercase tracking-wide text-[#8a7b6d]">Admins</p>
            <p class="text-3xl font-bold text-[#3b3027] mt-2">{{ \App\Models\User::where('is_admin', true)->count() }}</p>
        </div>
        <div class="bg-[#f9f6f1] border border-[#e0d8cc] rounded-xl p-5">
            <p class="text-xs uppercase tracking-wide text-[#8a7b6d]">Non-Admins</p>
            <p class="text-3xl font-bold text-[#3b3027] mt-2">{{ \App\Models\User::where('is_admin', false)->count() }}</p>
        </div>
    </div>
    <div class="bg-[#f9f6f1] border border-[#e0d8cc] rounded-xl p-5">
        <h2 class="text-lg font-semibold text-[#3b3027] mb-2">Account Overview</h2>
        <p class="text-sm text-[#6f6256]">
            You are logged in as <span class="font-medium">{{ auth()->user()->email }}</span>.
        </p>
    </div>
</div>
@endsection