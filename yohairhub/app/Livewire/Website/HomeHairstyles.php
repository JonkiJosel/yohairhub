<?php

namespace App\Livewire\Website;

use App\Models\HairStyle;
use Livewire\Component;

class HomeHairstyles extends Component
{
    public function render()
    {
        return view('livewire.website.home-hairstyles', [
            'hairstyles' => HairStyle::all()
        ]);
    }
}
