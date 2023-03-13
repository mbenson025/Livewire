<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class DataTables extends Component
{

    use WithPagination;

    public $active = true;
    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.data-tables', [
            'users' => User::where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            })
                ->where('active', $this->active)
                ->paginate(10),
        ]);
    }
}