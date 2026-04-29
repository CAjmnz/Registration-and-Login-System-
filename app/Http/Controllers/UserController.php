<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('users.index', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname'  => ['required', 'string', 'max:255'],
            'birthday'  => ['nullable', 'date'],
            'address'   => ['nullable', 'string', 'max:255'],

            // strict 11-digit validation
            'contactno' => ['required', 'digits:11'],

            'email' => ['required', 'email', 'unique:users,email'],

            // password security
            'password' => ['required', 'string', 'min:8', 'confirmed'],

            'is_admin' => ['nullable', 'boolean'],
        ]);

        User::create([
            'firstname' => $validated['firstname'],
            'lastname'  => $validated['lastname'],
            'birthday'  => $validated['birthday'] ?? null,
            'address'   => $validated['address'] ?? null,
            'contactno' => $validated['contactno'],
            'email'     => $validated['email'],

            // SAFE HASHING
            'password'  => Hash::make($validated['password']),

            'is_admin'  => $request->boolean('is_admin'),
        ]);
        
        $this->userService->createUser($validated);

        return redirect()
            ->route('users.index')
            ->with('success', 'User created successfully');
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname'  => ['required', 'string', 'max:255'],
            'birthday'  => ['nullable', 'date'],
            'address'   => ['nullable', 'string', 'max:255'],

            'contactno' => ['required', 'digits:11'],

            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->id)
            ],

            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $user->fill([
            'firstname' => $validated['firstname'],
            'lastname'  => $validated['lastname'],
            'birthday'  => $validated['birthday'] ?? null,
            'address'   => $validated['address'] ?? null,
            'contactno' => $validated['contactno'],
            'email'     => $validated['email'],
        ]);

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->is_admin = $request->boolean('is_admin');
        $user->save();

        $this->userService->updateUser($user, $validated);

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
       $this->userService->deleteUser($user);

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully.');
    }
}