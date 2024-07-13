<?php

namespace App\Livewire\Dashboard;

use App\Models\Salon;
use Livewire\Component;

class TotalSalonsCard extends Component
{
    public $totalSalons;

    public function mount()
    {
        $this->totalSalons = Salon::count();
    }
    public function render()
    {
        return view('livewire.dashboard.total-salons-card');
    }
}
