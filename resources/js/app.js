document.addEventListener('DOMContentLoaded', () => {

    /* ================= CREATE MODAL ================= */

    const createModal = document.getElementById('createUserModal');
    const openCreateButton = document.getElementById('openCreateUserModal');
    const cancelCreateButton = document.getElementById('cancelCreateUserModal');

    openCreateButton?.addEventListener('click', () => {
        createModal.classList.remove('hidden');
        createModal.classList.add('flex');
        document.body.classList.add('overflow-hidden');
    });

    cancelCreateButton?.addEventListener('click', () => {
        createModal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    });

    /* ================= EDIT MODAL ================= */

    const editModal = document.getElementById('editUserModal');
    const editForm = document.getElementById('editUserForm');
    const cancelEditButton = document.getElementById('cancelEditUserModal');

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

            document.body.classList.add('overflow-hidden');

        });

    });

    cancelEditButton?.addEventListener('click', () => {
        editModal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    });

});