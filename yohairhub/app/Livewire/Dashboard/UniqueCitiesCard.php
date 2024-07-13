<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Salon;

class UniqueCitiesCard extends Component
{
    public $uniqueCities;

    public function mount()
    {
        $this->uniqueCities = Salon::distinct('city')->count('city');
    }

    public function render()
    {
        return view('livewire.dashboard.unique-cities-card');
    }
}