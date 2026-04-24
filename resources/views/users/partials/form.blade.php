<form method="POST" action="{{ route('users.store') }}" class="space-y-3">
    @csrf

    {{-- FIRST NAME + LAST NAME (SIDE BY SIDE) --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">

        <input
            type="text"
            name="firstname"
            value="{{ old('firstname') }}"
            placeholder="First Name"
            required
            class="w-full p-3 rounded-lg border border-[#d9d0c3] bg-white text-[#3b3027]
                   placeholder:text-[#8a7b6d]
                   focus:border-[#5b402a]
                   focus:ring-1 focus:ring-[#5b402a]
                   outline-none"
        >

        <input
            type="text"
            name="lastname"
            value="{{ old('lastname') }}"
            placeholder="Last Name"
            required
            class="w-full p-3 rounded-lg border border-[#d9d0c3] bg-white text-[#3b3027]
                   placeholder:text-[#8a7b6d]
                   focus:border-[#5b402a]
                   focus:ring-1 focus:ring-[#5b402a]
                   outline-none"
        >

    </div>

    {{-- BIRTHDAY --}}
    <input
        type="date"
        name="birthday"
        value="{{ old('birthday') }}"
        class="w-full p-3 rounded-lg border border-[#d9d0c3] bg-white text-[#3b3027]
               focus:border-[#5b402a]
               focus:ring-1 focus:ring-[#5b402a]
               outline-none"
    >

    {{-- ADDRESS --}}
    <input
        type="text"
        name="address"
        value="{{ old('address') }}"
        placeholder="Address"
        class="w-full p-3 rounded-lg border border-[#d9d0c3] bg-white text-[#3b3027]
               placeholder:text-[#8a7b6d]
               focus:border-[#5b402a]
               focus:ring-1 focus:ring-[#5b402a]
               outline-none"
    >

    {{-- CONTACT --}}
    <input
        type="text"
        name="contactno"
        value="{{ old('contactno') }}"
        placeholder="Contact Number"
        class="w-full p-3 rounded-lg border border-[#d9d0c3] bg-white text-[#3b3027]
               placeholder:text-[#8a7b6d]
               focus:border-[#5b402a]
               focus:ring-1 focus:ring-[#5b402a]
               outline-none"
    >

    {{-- EMAIL --}}
    <input
        type="email"
        name="email"
        value="{{ old('email') }}"
        placeholder="Email"
        required
        class="w-full p-3 rounded-lg border border-[#d9d0c3] bg-white text-[#3b3027]
               placeholder:text-[#8a7b6d]
               focus:border-[#5b402a]
               focus:ring-1 focus:ring-[#5b402a]
               outline-none"
    >

    {{-- PASSWORD --}}
    <input
        type="password"
        name="password"
        placeholder="Password"
        required
        class="w-full p-3 rounded-lg border border-[#d9d0c3] bg-white text-[#3b3027]
               focus:border-[#5b402a]
               focus:ring-1 focus:ring-[#5b402a]
               outline-none"
    >

    {{-- CONFIRM PASSWORD --}}
    <input
        type="password"
        name="password_confirmation"
        placeholder="Confirm Password"
        required
        class="w-full p-3 rounded-lg border border-[#d9d0c3] bg-white text-[#3b3027]
               focus:border-[#5b402a]
               focus:ring-1 focus:ring-[#5b402a]
               outline-none"
    >

{{-- ACTION BUTTONS --}}
    <div class="flex justify-end gap-3 pt-2">

        <button
            type="button"
            id="cancelCreateUserModal"
            class="px-4 py-2 border rounded-lg"
        >
            Cancel
        </button>

        <button
            type="submit"
            class="bg-[#5b402a] text-white px-5 py-2 rounded-lg"
        >
            Create Account
        </button>

    </div>  {{-- ← THIS WAS MISSING --}}

</form>  {{-- ← THIS WAS MISSING --}}