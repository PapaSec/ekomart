<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Frontend\Home;


// ===== PUBLIC ROUTES =====
Route::get('/', Home::class)->name('home');

