<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\PlaylistController;

// Root
Route::get('/', function () {
    return view('welcome');
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

// Profile routes (authenticated users)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::patch('/password', [PasswordController::class, 'update'])->name('password.update');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Admin-only routes
    Route::middleware('role:admin')->group(function () {

        // User management
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

        // Track management
        Route::post('/tracks', [TrackController::class, 'store'])->name('tracks.store');
        Route::put('/tracks/{track}', [TrackController::class, 'update'])->name('tracks.update');
        Route::delete('/tracks/{track}', [TrackController::class, 'destroy'])->name('tracks.destroy');

        // Playlist management
        Route::post('/playlists', [PlaylistController::class, 'store'])->name('playlists.store');
        Route::put('/playlists/{playlist}', [PlaylistController::class, 'update'])->name('playlists.update');
        Route::delete('/playlists/{playlist}', [PlaylistController::class, 'destroy'])->name('playlists.destroy');

    });
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');

    Route::post('/register', [RegisteredUserController::class, 'store']);
});
