@extends('layouts.app')

@section('title', 'Customers')

@section('content')
@php $authUser = auth()->user(); @endphp
@if($authUser && ($authUser->is_admin || $authUser->email === 'jimenezchristianaugustus@gmail.com'))
    <a href="{{ route('users.create') }}"
class="-mt-10 bg-[#5b402a] hover:bg-[#4a331f] text-white px-4 py-2 rounded-lg text-sm transition">
        + Add User
    </a>
@endif

<div class="bg-[#f9f6f1] border border-[#e0d8cc] rounded-xl overflow-hidden">
    {{-- ... --}}
    <tbody class="divide-y divide-[#e7dfd4]">
        @forelse($users as $user)
            {{-- row --}}
        @empty
            {{-- empty --}}
        @endforelse
    </tbody>
</div>
    <div class="bg-[#f9f6f1] border border-[#e0d8cc] rounded-xl overflow-hidden">
        {{-- Fixed header table --}}
        <table class="w-full text-sm table-fixed">
            <colgroup>
                <col class="w-[5%]">
                <col class="w-[12%]">
                <col class="w-[12%]">
                <col class="w-[12%]">
                <col class="w-[16%]">
                <col class="w-[10%]">
                <col class="w-[7%]">
                <col class="w-[16%]">
                <col class="w-[10%]">
            </colgroup>
            <thead class="bg-[#efe9df] text-[#5a4a3b] uppercase text-xs">
                <tr>
                    <th class="px-3 py-3 text-left">#</th>
                    <th class="px-3 py-3 text-left">First Name</th>
                    <th class="px-3 py-3 text-left">Last Name</th>
                    <th class="px-3 py-3 text-left">Birthday</th>
                    <th class="px-3 py-3 text-left">Address</th>
                    <th class="px-3 py-3 text-left">Contact</th>
                    <th class="px-3 py-3 text-left">Age</th>
                    <th class="px-3 py-3 text-left">Email</th>
                    <th class="px-3 py-3 text-left">Actions</th>
                </tr>
            </thead>
        </table>

        {{-- Scrollable body table --}}
        <div class="max-h-[58vh] overflow-y-auto">
            <table class="w-full text-sm table-fixed">
                <colgroup>
                    <col class="w-[5%]">
                    <col class="w-[12%]">
                    <col class="w-[12%]">
                    <col class="w-[12%]">
                    <col class="w-[16%]">
                    <col class="w-[10%]">
                    <col class="w-[7%]">
                    <col class="w-[16%]">
                    <col class="w-[10%]">
                </colgroup>
                <tbody class="divide-y divide-[#e7dfd4]">
                    @forelse($users as $user)
                        <tr class="hover:bg-[#f3ede4]">
                            <td class="px-3 py-3">{{ $loop->iteration }}</td>
                            <td class="px-3 py-3">{{ $user->firstname }}</td>
                            <td class="px-3 py-3">{{ $user->lastname }}</td>
                            <td class="px-3 py-3">{{ optional($user->birthday)->format('Y-m-d') ?? 'N/A' }}</td>
                            <td class="px-3 py-3 truncate" title="{{ $user->address }}">{{ $user->address ?? 'N/A' }}</td>
                            <td class="px-3 py-3">{{ $user->contactno ?? 'N/A' }}</td>
                            <td class="px-3 py-3">{{ $user->age ?? 'N/A' }}</td>
                            <td class="px-3 py-3 truncate" title="{{ $user->email }}">{{ $user->email }}</td>
                            <td class="px-3 py-3">
                                <div class="flex gap-2">
                                    <a href="{{ route('users.edit', $user) }}"
                                       class="px-3 py-1 rounded bg-amber-500 text-white text-xs">Edit</a>
                                    <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Delete this user?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-1 rounded bg-red-600 text-white text-xs">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="px-4 py-6 text-center text-[#8a7b6d]">
                                No users registered yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection