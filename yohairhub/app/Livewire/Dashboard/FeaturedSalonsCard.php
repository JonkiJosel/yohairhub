<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Salon;

class FeaturedSalonsCard extends Component
{
    public $featuredSalons;

    public function mount()
    {
        $this->featuredSalons = Salon::where('is_featured', true)->count();
    }

    public function render()
    {
        return view('livewire.dashboard.featured-salons-card');
    }
}