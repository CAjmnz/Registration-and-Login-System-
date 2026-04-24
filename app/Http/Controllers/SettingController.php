<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    /**
     * Show settings page
     */
    public function index()
    {
        // Get currently logged-in user
        $user = Auth::user();

        // Load user settings (relationship)
        $settings = $user->setting;

        // Send data to Blade view
        return view('settings.index', compact('settings'));
    }
    public function update(Request $request)
    {
        // Validate input
        $request->validate([
        'theme' => 'required|in:light,dark',
        'font_size' => 'required|in:small,medium,large',
    ]);

        // Get logged-in user
        $user = auth()->user();

        // Update settings
        $user->setting->update([
        'theme' => $request->theme,
        'font_size' => $request->font_size,
    ]);

        // Redirect back with success message
        return redirect()
        ->route('settings.index')
        ->with('success', 'Settings updated successfully.');
    } 
}