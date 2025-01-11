<?php

namespace App\Livewire;

use Livewire\Component;

class SearchBar extends Component
{
    public $search, $className;
    public function render()
    {
        return view('livewire.search-bar');
    }

    public function updatedSearch()
    {
        $this->dispatch('searchTask', $this->search);
        $this->dispatch('mobile.searchTask', $this->search);
    }
}
