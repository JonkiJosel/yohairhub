<?php

namespace App\Livewire\Website;

use App\Models\Salon;
use Livewire\Component;

class FeaturedSalonsFooter extends Component
{
    public function render()
    {
        return view('livewire.website.featured-salons-footer', [
            'salons' => Salon::inRandomOrder()->take(2)->get(),
        ]);
    }
}