@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

@php
    $theme = auth()->check()
        ? auth()->user()->setting->theme ?? 'latte'
        : 'latte';
@endphp

<div class="space-y-6">

    <div>
        <h1 class="text-2xl font-semibold text-[#3b3027]">
            Dashboard
        </h1>

        <p class="text-sm text-[#7a6d60] mt-1">
            Welcome back, {{ auth()->user()->firstname ?? 'User' }}.
        </p>
    </div>

    {{-- STATS --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

        <div class="

        @if($theme === 'cold_brew')
            bg-[#2b221d] border-b border-[#8C5A3C]
        @elseif($theme === 'flat_white')
            bg-[#f6f1ea] border-b border-[#d6cfc7]
        @else
            bg-[#e8ded6] border-b border-[#c8b8a6]
        @endif
    
     rounded-xl p-5">
            <p class="text-xs uppercase tracking-wide text-[#C08552]">
                Total Users
            </p>

            <p class="text-3xl font-bold text-[#3b3027] mt-2">
                {{ \App\Models\User::count() }}
            </p>
        </div>

        <div class="

        @if($theme === 'cold_brew')
            bg-[#2b221d] border-b border-[#8C5A3C]
        @elseif($theme === 'flat_white')
            bg-[#f6f1ea] border-b border-[#d6cfc7]
        @else
            bg-[#e8ded6] border-b border-[#c8b8a6]
        @endif
    
     rounded-xl p-5">
            <p class="text-xs uppercase tracking-wide text-[#C08552]">
                Admins
            </p>

            <p class="text-3xl font-bold text-[#3b3027] mt-2">
                {{ \App\Models\User::where('is_admin', true)->count() }}
            </p>
        </div>

        <div class="

        @if($theme === 'cold_brew')
            bg-[#2b221d] border-b border-[#8C5A3C]
        @elseif($theme === 'flat_white')
            bg-[#f6f1ea] border-b border-[#d6cfc7]
        @else
            bg-[#e8ded6] border-b border-[#c8b8a6]
        @endif
    
     rounded-xl p-5">
            <p class="text-xs uppercase tracking-wide text-[#C08552]">
                Non-Admins
            </p>

            <p class="text-3xl font-bold text-[#3b3027] mt-2">
                {{ \App\Models\User::where('is_admin', false)->count() }}
            </p>
        </div>

    </div>

    {{-- ACCOUNT OVERVIEW --}}
    <div class="

    @if($theme === 'cold_brew')
        bg-[#2b221d] border-b border-[#8C5A3C]
    @elseif($theme === 'flat_white')
        bg-[#f6f1ea] border-b border-[#d6cfc7]
    @else
        bg-[#e8ded6] border-b border-[#c8b8a6]
    @endif

 rounded-xl p-5">

        <h2 class="text-lg font-semibold text-[#3b3027] mb-2">
            Account Overview
        </h2>

        <p class="text-sm text-[#6f6256]">
            You are logged in as
            <span class="font-medium">
                {{ auth()->user()->email }}
            </span>.
        </p>

    </div>

    {{-- USERS TABLE --}}
    <div class="border rounded-xl overflow-hidden

        @if($theme === 'cold_brew')
            border-[#3a2f28]
        @elseif($theme === 'flat_white')
            border-[#d6cfc7]
        @else
            border-[#c8b8a6]
        @endif
    ">

        <table class="w-full text-sm text-left border-collapse">

            <thead class="

                @if($theme === 'cold_brew')
                    bg-[#2b221d] border-b border-[#3a2f28]
                @elseif($theme === 'flat_white')
                    bg-[#f6f1ea] border-b border-[#d6cfc7]
                @else
                    bg-[#e8ded6] border-b border-[#c8b8a6]
                @endif

            ">

                <tr>

                    <th class="px-3 py-3 b">#</th>

                    <th class="px-3 py-3 b">
                        First Name
                    </th>

                    <th class="px-3 py-3 b">
                        Last Name
                    </th>
                    <th class="px-3 py-3 b">
                        Birthday
                    </th>
                    <th class="px-3 py-3 b">
                        Address
                    </th>
                    <th class="px-3 py-3 b">
                        Contactno
                    </th>
                    <th class="px-3 py-3 b">
                        Email
                    </th>

                    <th class="px-3 py-3 b">
                        Role
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($users as $user)

                <tr class="

                    @if($theme === 'cold_brew')
                        hover:bg-[#2b221d]
                    @elseif($theme === 'flat_white')
                        hover:bg-[#f3ede4]
                    @else
                        hover:bg-[#ede4da]
                    @endif

                ">

                    <td class="px-3 py-3 ">
                        {{ $loop->iteration }}
                    </td>

                    <td class="px-3 py-3 ">
                        {{ $user->firstname }}
                    </td>

                    <td class="px-3 py-3 ">
                        {{ $user->lastname }}
                    </td>
                    <td class="px-3 py-3">
                        {{ $user->birthday?->format('M d, Y') }}
                    </td>
                    <td class="px-3 py-3 ">
                        {{ $user->address }}
                    </td>
                    <td class="px-3 py-3 ">
                        {{ $user->contactno }}
                    </td>
                    <td class="px-3 py-3 ">
                        {{ $user->email }}
                    </td>

                    <td class="px-3 py-3 ">

                        @if($user->is_admin)

                            <span class="font-medium">
                                Admin
                            </span>

                        @else

                            User

                        @endif

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5"
                        class="px-3 py-4 text-center border">

                        No registered users found

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection