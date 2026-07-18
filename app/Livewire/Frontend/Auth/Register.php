<?php

namespace App\Livewire\Frontend\Auth;

use App\Models\User;
use Illuminate\Support\Facades\{Auth, Hash};
use Livewire\Component;
use Livewire\Attributes\{Layout, Title};

#[Layout('layouts.app')]
#[Title('Register - Ekomart')]
class Register extends Component
{
    // Component Properties bound via wire:model
    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Validation Rules for incoming customer accounts.
     */
    protected array $rules = [
        'name'     => 'required|string|min:2|max:255',
        'email'    => 'required|string|email|max:255|unique:users,email',
        'phone'    => 'required|string|min:10|max:20|unique:users,phone',
        'password' => 'required|string|min:8|confirmed', // 'confirmed' automatically matches password_confirmation
    ];

    /**
     * Handle registration form submission.
     */
    public function register()
    {
        // Run validation suite
        $this->validate();

        // Create the user record safely
        $user = User::create([
            'name'     => $this->name,
            'email'    => $this->email,
            'phone'    => $this->phone,
            'password' => Hash::make($this->password),
            'status'   => 'active', // Explicitly setting active state on onboarding
        ]);

        // Senior Move: Attach Spatie database role immediately
        $user->assignRole('customer');

        // Log the fresh user directly into the system
        Auth::login($user);

        // Standard security practice post-authentication
        session()->regenerate();

        // Flash message and bounce to intended path or fallback home
        session()->flash('success', 'Account created successfully! Welcome to Ekomart.');

        return redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('livewire.frontend.auth.register');
    }
}