<?php

namespace App\Livewire\Frontend\Auth;

use Illuminate\Support\Facades\{Auth, RateLimiter};
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};

#[Layout('layouts.app')]
#[Title('Login - Ekomart')]
class Login extends Component
{
    // Component Properties (Bound to HTML inputs via wire:model)
    public string $email = '';
    public string $password = '';
    public bool $remember = false;

    // Real-time Validation Rules
    protected array $rules = [
        'email'    => 'required|email',
        'password' => 'required',
    ];

    /**
     * Handle the incoming authentication request.
     */
    public function authenticate()
    {
        // Run validation rules
        $this->validate();

        // Apply Brute-Force Rate Limiting
        $this->ensureIsNotRateLimited();

        // Attempt to log the user in
        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password, 'status' => 'active'], $this->remember)) {

            // Increment the failed login attempts counter
            RateLimiter::hit($this->throttleKey(), 60); // Locks for 60 seconds if limit hit

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        // Clear rate limiter cache on successful login
        RateLimiter::clear($this->throttleKey());

        // Regenerate session to protect against Session Fixation attacks
        session()->regenerate();

        // Flash message and redirect
        session()->flash('success', 'Welcome back!');
        
        return redirect()->intended(route('home'));
    }

    /**
     * Handle the Socialite Google Redirection Hook
     */
    public function redirectToGoogle()
    {
        // We will wire up Laravel Socialite here in the very next phase
        return redirect()->route('auth.google');
    }

    /**
     * Generate a unique throttle key for the current request.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
    }

    /**
     * Ensure the login request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    public function render()
    {
        return view('livewire.frontend.auth.login');
    }
}