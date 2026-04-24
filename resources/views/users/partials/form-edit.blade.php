<form
    method="POST"
    id="editUserForm"
    action=""
    class="space-y-3"
>
    @csrf
    @method('PUT')

    <input type="hidden" name="user_id" id="edit_user_id">

    {{-- FIRST NAME + LAST NAME (SIDE BY SIDE) --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">

        <input
            name="firstname"
            id="edit_firstname"
            placeholder="First Name"
            class="w-full p-3 rounded-lg border border-[#d9d0c3]"
        >

        <input
            name="lastname"
            id="edit_lastname"
            placeholder="Last Name"
            class="w-full p-3 rounded-lg border border-[#d9d0c3]"
        >

    </div>

    <input
        type="date"
        name="birthday"
        id="edit_birthday"
        class="w-full p-3 rounded-lg border border-[#d9d0c3]"
    >

    <input
        name="address"
        id="edit_address"
        placeholder="Address"
        class="w-full p-3 rounded-lg border border-[#d9d0c3]"
    >

    <input
        name="contactno"
        id="edit_contactno"
        placeholder="Contact Number"
        class="w-full p-3 rounded-lg border border-[#d9d0c3]"
    >

    <input
        name="email"
        id="edit_email"
        placeholder="Email"
        class="w-full p-3 rounded-lg border border-[#d9d0c3]"
    >

    <div class="flex justify-end gap-3 pt-2">

        <button
            type="button"
            id="cancelEditUserModal"
            class="px-4 py-2 border rounded-lg"
        >
            Cancel
        </button>

        <button
            type="submit"
            class="bg-amber-500 text-white px-5 py-2 rounded-lg"
        >
            Update User
        </button>

    </div>

</form>