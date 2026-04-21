@extends('layouts.app')

@section('title', 'Users')

@section('content')
<div class="max-w-5xl mx-auto px-6 py-10">

    <h1 class="text-3xl font-bold text-yellow-400 mb-6">Registered Users</h1>

    <div class="border border-white/10 rounded-2xl overflow-hidden backdrop-blur-md bg-white/5">
        <table class="w-full text-sm text-white">
            <thead class="bg-white/10 text-yellow-400 uppercase text-xs tracking-wider">
                <tr>
                    <th class="px-6 py-4 text-left">#</th>
                    <th class="px-6 py-4 text-left">FirstName</th>
                    <th class="px-6 py-4 text-left">LastName</th>
                    <th class="px-6 py-4 text-left">Birthday</th>
                    <th class="px-6 py-4 text-left">Contact Name</th>
                    <th class="px-6 py-4 text-left">Age</th>
                    <th class="px-6 py-4 text-left">Email</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/10">
                @forelse($users as $user)
                <tr class="hover:bg-white/5 transition">
                    <td class="px-6 py-4 text-white/50">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 text-white/70">{{ $user->firstname }}</td>
                            <td class="px-6 py-4 text-white/70">{{ $user->lastname }}</td>
                            <td class="px-6 py-4 text-white/70">{{ $user->birthday   }}</td>
                            <td class="px-6 py-4 text-white/70">{{ $user->contactno }}</td>
                            <td class="px-6 py-4 text-white/70">{{ $user->age }}</td>
                            <td class="px-6 py-4 text-white/70">{{ $user->email }}</td>
                        </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-8 text-center text-white/40">
                        No users registered yet.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection