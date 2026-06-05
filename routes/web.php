<?php

use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\MusicController;

// Root - redirect to login
Route::get('/', function () {
    return redirect()->route('login');
});

// Home (authenticated users)
Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name('home');

// Search
Route::get('/search', [SearchController::class, 'index'])
    ->middleware('auth')
    ->name('search');

// Music CRUD
Route::resource('music', MusicController::class)
    ->middleware('auth');

// Dashboard (admin only)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified', 'role:admin'])
    ->name('dashboard');

// Admin routes (admin only)
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    // User management
    Route::post('/users',           [AdminController::class, 'storeUser'])->name('users.store');
    Route::patch('/users/{user}',   [AdminController::class, 'updateUser'])->name('users.update');
    Route::delete('/users/{user}',  [AdminController::class, 'destroyUser'])->name('users.destroy');

    // Track management (from dashboard modals)
    Route::post('/music',           [MusicController::class, 'store'])->name('music.store');
    Route::patch('/music/{music}',  [MusicController::class, 'update'])->name('music.update');
    Route::delete('/music/{music}', [MusicController::class, 'destroy'])->name('music.destroy');
});

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile',    [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile',  [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/password', [PasswordController::class, 'update'])->name('password.update');
});

// Guest routes (login & register)
Route::middleware('guest')->group(function () {
    Route::get('/login',     [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login',    [AuthController::class, 'login']);
    Route::get('/register',  function () {
        return view('auth.register');
    })->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');
