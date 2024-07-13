<?php

namespace App\Livewire\Dashboard;

use App\Models\HairStyle;
use Livewire\Component;
class TotalHairstylesCard extends Component
{
    public $totalHairstyles;

    public function mount()
    {
        $this->totalHairstyles = HairStyle::count();
    }

    public function render()
    {
        return view('livewire.dashboard.total-hairstyles-card');
    }
}
