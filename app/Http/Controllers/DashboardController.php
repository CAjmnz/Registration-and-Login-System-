<?php

namespace App\Http\Controllers;

use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Read-only list of registered users
        $users = User::latest()->get();

        return view('dashboard', compact('users'));
    }
}