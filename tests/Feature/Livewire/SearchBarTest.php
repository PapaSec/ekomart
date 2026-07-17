<?php

use App\Livewire\Frontend\SearchBar;
use Livewire\Livewire;

it('renders the search bar with an empty query state', function () {
    Livewire::test(SearchBar::class)
        ->assertSet('query', '')
        ->assertSee('Search for products, categories...');
});
