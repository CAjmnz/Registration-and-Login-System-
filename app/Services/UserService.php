<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function createUser(array $data): User
    {
        return User::create([
            'firstname' => $data['firstname'],
            'lastname'  => $data['lastname'],
            'birthday'  => $data['birthday'] ?? null,
            'address'   => $data['address'] ?? null,
            'contactno' => $data['contactno'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
            'is_admin'  => $data['is_admin'] ?? false,
        ]);
    }

    public function updateUser(User $user, array $data): User
    {
        $user->update([
            'firstname' => $data['firstname'],
            'lastname'  => $data['lastname'],
            'birthday'  => $data['birthday'] ?? null,
            'address'   => $data['address'] ?? null,
            'contactno' => $data['contactno'],
            'email'     => $data['email'],
        ]);

        if (!empty($data['password'])) {
            $user->update([
                'password' => Hash::make($data['password'])
            ]);
        }

        return $user;
    }

    public function deleteUser(User $user): void
    {
        $user->delete();
    }
}