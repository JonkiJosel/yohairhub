<?php

namespace App\Livewire\Website;

use App\Models\Salon;
use Livewire\Component;

class TrendingSalons extends Component
{
    public function render()
    {
        return view('livewire.website.trending-salons', [
            'salons' => Salon::inRandomOrder()->take(3)->get(),
        ]);
    }
}
