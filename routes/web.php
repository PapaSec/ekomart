<?php

use Illuminate\Support\Facades\{Auth, Route};

use App\Livewire\Frontend\Home;
use App\Livewire\Frontend\Auth\{Login, Register};

// ===== PUBLIC ROUTES =====
Route::get('/', Home::class)->name('home');


// ===== GUEST ONLY ROUTES =====
Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
    
    // NOTE: We will build these two out right after we verify login/register works
    // Route::get('/forgot-password', ForgotPassword::class)->name('password.request');
    // Route::get('/reset-password/{token}', ResetPassword::class)->name('password.reset');
});


// ===== LOGOUT =====
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout')->middleware('auth');

// Google OAuth Redirect Route (Placeholder for next step)
Route::get('/auth/google', function () {
    return 'Google OAuth redirecting...';
})->name('auth.google');