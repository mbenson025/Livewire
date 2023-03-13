<?php

namespace Tests\Feature;

use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\SearchDropdown;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


class SearchDropdownTest extends TestCase
{
    public function search_dropdown_searches_correctly()
    {
        Livewire::class(SearchDropdown::class)
            ->assertDontSee('John Lennon')
            ->set('search', 'Imagine')
            ->assertSee('John Lennon');
    }
}