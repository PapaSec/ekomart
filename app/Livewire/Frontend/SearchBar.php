<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class SearchBar extends Component
{
    public $query = '';

    public function search()
    {
        // Handle search submission here.
    }

    public function render()
    {
        return view('livewire.frontend.search-bar');
    }
}
