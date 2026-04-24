<?php
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return auth()->check() ? redirect('/dashboard') : redirect('/login');
});
/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register.show');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});
/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');
    /*
    |--------------------------------------------------------------------------
    | User Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware('can:view-users')->group(function () {
    Route::resource('users', UserController::class)->except(['show']);
    });
    /*
    |--------------------------------------------------------------------------
    | Setting  Routes
    |--------------------------------------------------------------------------
    */

Route::middleware(['auth'])->group(function () {

    Route::get('/settings',
        [SettingController::class, 'index']
    )->name('settings.index');

    Route::post('/settings',
        [SettingController::class, 'update']
    )->name('settings.update');

});
});
