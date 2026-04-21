<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;


class Controller extends BaseController
{
 /// Show the registration form   
public function showRegister()
{
    return view('auth.register');
}
 /// Store the registration form   
public function register(Request $request)
{
    $validated = $request->validate([
        'firstname' => ['required', 'string', 'max:50'],
        'lastname' => ['required', 'string', 'max:50'],
        'birthday' => ['nullable', 'date'],
        'address' => ['nullable', 'string', 'max:100'],
        'contactno' => ['nullable', 'string', 'max:20'],
        'email' => ['required', 'email', 'unique:users'],
        'password' => ['required', 'min:6'],
    ]);

    User::create([
        'firstname' => $validated['firstname'],
        'lastname' => $validated['lastname'],
        'birthday' => $validated['birthday'],
        'address' => $validated['address'],
        'contactno' => $validated['contactno'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
    ]);

    return redirect('/login')->with('success', 'Account created successfully.');
}
 /// Show the login form   
public function showLogin()
{
    return view('auth.login');
}
 /// Handle the login form submission   
 public function login(Request $request)
 {
     $credentials = $request->validate([
         'email' => ['required', 'email'],
         'password' => ['required'],
     ]);
     $throttleKey = Str::lower($request->input('email')).'|'.$request->ip();
     // Block if too many attempts
     if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
         $seconds = RateLimiter::availableIn($throttleKey);
         throw ValidationException::withMessages([
             'email' => "Too many login attempts. Try again in {$seconds} seconds.",
         ]);
     }
     if (! Auth::attempt($credentials)) {
         // Count failed attempt
         RateLimiter::hit($throttleKey, 60); // lock window: 60 seconds
         throw ValidationException::withMessages([
             'email' => 'Invalid credentials.',
         ]);
     }
     // Successful login: clear attempts + regenerate session
     RateLimiter::clear($throttleKey);
     $request->session()->regenerate();
     return redirect()->route('dashboard');
 }                          
    /// Handle the logout action      
public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');
}
/// Show the users list, but only for a specific email (for demonstration purposes)
public function users()
{
    // Block non-admins
    if (auth()->user()->email !== 'jimenezchristianaugustus@gmail.com') {
        return redirect('/dashboard');
    }

    $users = User::latest()->get();
    return view('users.index', compact('users'));
}
}
