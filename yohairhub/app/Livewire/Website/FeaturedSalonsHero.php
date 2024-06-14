<?php

namespace App\Livewire\Website;

use App\Models\Salon;
use Livewire\Component;

class FeaturedSalonsHero extends Component
{
    public function render()
    {
        return view('livewire.website.featured-salons-hero', [
            'salons' => Salon::inRandomOrder()->take(4)->get(),
        ]);
    }
}
