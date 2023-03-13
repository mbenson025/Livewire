<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchDropdown extends Component
{
    public $search;
    public $searchResults = [];

    public function updatedSearch($newValue)
    {
        $response = Http::get('https://itunes.apple.com/search/?term=' . $this->search . '&limit=10');

        // dd($response->json());

        $this->searchResults = $response->json()['results'];

        dump($this->searchResults);
    }


    public function render()
    {
        return view('livewire.search-dropdown');
    }
}