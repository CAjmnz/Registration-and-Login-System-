<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
class SettingsController extends Controller
{
    /**
     * Update the authenticated user's theme and font size settings.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'theme'     => ['required', 'in:flat_white,latte,spanish_latte,cold_brew'],
            'font_size' => ['required', 'in:small,medium,large'],
        ]);
 
        // Get or create the setting record for this user
        $setting = auth()->user()->setting()->firstOrCreate(
            ['user_id' => auth()->id()],
            ['theme' => 'latte', 'font_size' => 'medium']
        );
 
        $setting->update([
            'theme'     => $validated['theme'],
            'font_size' => $validated['font_size'],
        ]);
 
        return redirect()->back()->with('settings_saved', true);
    }
}