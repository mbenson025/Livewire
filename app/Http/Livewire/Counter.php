<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    // define a piece of state
    public $count = 0;

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }

    // When an interaction occurs, livewire makes an AJAX request to the server with updated data

    // The server re-renders the component and responds with new HTML
    public function render()
    {
        return view('livewire.counter');
    }
}