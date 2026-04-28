<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Observers\UserObserver;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::share(
            'theme',
            auth()->user()?->setting?->theme ?? 'spanish_latte'
        );
    
        View::share(
            'fontSize',
            auth()->user()?->setting?->font_size ?? 'medium'
        );
    }
}
