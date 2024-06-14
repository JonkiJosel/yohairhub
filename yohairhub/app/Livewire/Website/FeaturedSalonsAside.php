<?php

namespace App\Livewire\Website;

use App\Models\Salon;
use Livewire\Component;

class FeaturedSalonsAside extends Component
{
    public function render()
    {
        return view('livewire.website.featured-salons-aside', [
            'salons' => Salon::inRandomOrder()->take(3)->get(),
        ]);
    }
}
