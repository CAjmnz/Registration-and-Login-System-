@extends('layouts.app')

@section('title', 'REGISTERED USERS')

@section('content')

@php
    $authUser = auth()->user();
    $canManageUsers = $authUser && ($authUser->is_admin || $authUser->email === 'jimenezchristianaugustus@gmail.com');
@endphp
@php
    $theme = auth()->check()
        ? auth()->user()->setting->theme ?? 'latte'
        : 'latte';
@endphp
<div class="space-y-4 text-[#3b3027]">

    <div class="flex items-center justify-between">

        <div>
            <h1 class="text-2xl font-semibold text-      
      @if($theme === 'cold_brew')
    text-[#C08552]
@elseif($theme === 'flat_white')
    text-[#322C2B]
@else
    text-[#4B2E2B]
@endif
">
                Registered Users
            </h1>

            <p class="text-sm text        
      @if($theme === 'cold_brew')
    text-[#C08552]
@elseif($theme === 'flat_white')
    text-[#322C2B]
@else
    text-[#4B2E2B]
@endif
mt-1">
                Manage and monitor all registered accounts.
            </p>
        </div>

        @if($canManageUsers)
        <button
            type="button"
            id="openCreateUserModal"
            class="bg-[#5b402a] hover:bg-[#4a331f] text-white px-4 py-2 rounded-lg text-sm"
        >
            + Add User
        </button>
        @endif

    </div>

    {{-- SUCCESS ALERT --}}
    @if (session('success'))
        <div
            id="successAlert"
            class="bg-green-600 text-white px-4 py-3 rounded-lg text-sm transition-opacity duration-500"
        >
            {{ session('success') }}
        </div>

        <script>
            setTimeout(() => {
                const alert = document.getElementById('successAlert');
                if (alert) {
                    alert.style.opacity = '0';
                    setTimeout(() => alert.remove(), 500);
                }
            }, 3000);
        </script>
    @endif

    {{-- TABLE --}}
<div class="border rounded-xl max-h-[58vh] overflow-auto
    @if($theme === 'cold_brew')
        bg-[#2b221d] border-[#8C5A3C]
    @elseif($theme === 'flat_white')
        bg-[#f6f1ea] border-[#d6cfc7]
    @else
        bg-[#e8ded6] border-[#c8b8a6]
    @endif
">

    <table class="w-full min-w-[900px] text-sm border-collapse
        @if($theme === 'cold_brew')
            text-[#C08552]
        @elseif($theme === 'flat_white')
            text-[#543310]
        @else
            text-[#543310]
        @endif
    ">

        <thead class="uppercase text-xs border-b
            @if($theme === 'cold_brew')
                bg-[#2b221d] border-b border-[#3a2f28]
            @elseif($theme === 'flat_white')
                bg-[#f6f1ea] border-b border-[#d6cfc7]
            @else
                bg-[#e8ded6] border-b border-[#c8b8a6]
            @endif
        ">

            <tr>
                <th class="px-3 py-3">#</th>
                <th class="px-3 py-3">First Name</th>
                <th class="px-3 py-3">Last Name</th>
                <th class="px-3 py-3">Birthday</th>
                <th class="px-3 py-3">Address</th>
                <th class="px-3 py-3">Contact</th>
                <th class="px-3 py-3">Age</th>
                <th class="px-3 py-3">Email</th>
                <th class="px-3 py-3">Actions</th>
            </tr>

        </thead>

<tbody class="

@if($theme === 'dark')
    bg-gray-800 divide-y divide-gray-700
@elseif($theme === 'contrast')
    bg-black divide-y divide-yellow-500
@else
    divide-y divide-[#e7dfd4]
@endif
">

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

<td class="px-3 py-3 ">
    {{ optional($user->birthday)->format('M d, Y') }}
</td>

<td class="px-3 py-3 ">
    {{ $user->address }}
</td>

<td class="px-3 py-3 ">
    {{ $user->contactno }}
</td>

<td class="px-3 py-3 ">
    {{ $user->age }}
</td>

<td class="px-3 py-3 ">
    {{ $user->email }}
</td>

<td class="px-3 py-3  space-x-2">

@if($canManageUsers)

<button
    type="button"
    class="px-1 py-1 rounded bg-amber-500 text-white text-xs editUserButton"
    data-id="{{ $user->id }}"
    data-firstname="{{ $user->firstname }}"
    data-lastname="{{ $user->lastname }}"
    data-birthday="{{ optional($user->birthday)->format('Y-m-d') }}"
    data-address="{{ $user->address }}"
    data-contactno="{{ $user->contactno }}"
    data-email="{{ $user->email }}"
>
    Edit
</button>

<form
    action="{{ route('users.destroy', $user) }}"
    method="POST"
    class="inline"
>
    @csrf
    @method('DELETE')

    <button
        type="submit"
        class="px-1 py-1 rounded bg-red-600 text-white text-xs"
        onclick="return confirm('Delete this user?')"
    >
        Delete
    </button>

</form>

@endif

</td>

</tr>

@empty

<tr>
<td colspan="9" class="px-3 py-6 text-center border">
    No users found.
</td>
</tr>

@endforelse

</tbody>

</table>

</div>
</div>
{{-- ================= CREATE MODAL ================= --}}
<div
    id="createUserModal"
    class="
        fixed inset-0 hidden items-center justify-center bg-black/50
        @if($theme === 'dark') bg-black/70 @endif
        @if($theme === 'contrast') bg-black/90 @endif
    "
>

    <div class="
        p-8 rounded-lg w-[520px]

        @if($theme === 'dark')
            bg-gray-800 text-gray-100
        @elseif($theme === 'contrast')
            bg-black text-yellow-300 border border-yellow-400
        @else
            bg-white text-[#3b3027]
        @endif
    ">

        <h2 class="text-xl font-bold mb-4">
            Add User
        </h2>

        @include('users.partials.form')

       

    </div>

</div>
{{-- ================= EDIT MODAL ================= --}}
<div
    id="editUserModal"
    class="
        fixed inset-0 hidden items-center justify-center bg-black/50
        @if($theme === 'dark') bg-black/70 @endif
        @if($theme === 'contrast') bg-black/90 @endif
    "
>
   <div class="
    p-8 rounded-lg w-[520px]

    @if($theme === 'dark')
        bg-gray-800 text-gray-100
    @elseif($theme === 'contrast')
        bg-black text-yellow-300 border border-yellow-400
    @else
        bg-white text-[#3b3027]
    @endif
">
        <h2 class="text-xl font-bold mb-4">Edit User</h2>
        @include('users.partials.form-edit')
    </div>
</div>

{{-- ================= MODAL JS ================= --}}
<script>
document.addEventListener('DOMContentLoaded', () => {

    const createModal = document.getElementById('createUserModal');
    const openCreateButton = document.getElementById('openCreateUserModal');

    openCreateButton?.addEventListener('click', () => {
        createModal.classList.remove('hidden');
        createModal.classList.add('flex');
    });

    const editModal = document.getElementById('editUserModal');
    const editForm = document.getElementById('editUserForm');

    document.querySelectorAll('.editUserButton').forEach(button => {
        button.addEventListener('click', () => {

            const id = button.dataset.id;

            document.getElementById('edit_user_id').value = id;
            document.getElementById('edit_firstname').value = button.dataset.firstname || '';
            document.getElementById('edit_lastname').value = button.dataset.lastname || '';
            document.getElementById('edit_birthday').value = button.dataset.birthday || '';
            document.getElementById('edit_address').value = button.dataset.address || '';
            document.getElementById('edit_contactno').value = button.dataset.contactno || '';
            document.getElementById('edit_email').value = button.dataset.email || '';

            editForm.action = `/users/${id}`;

            editModal.classList.remove('hidden');
            editModal.classList.add('flex');
        });
    });

});
</script>

@endsection