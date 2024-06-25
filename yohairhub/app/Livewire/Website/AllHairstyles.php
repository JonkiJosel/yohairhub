<?php

namespace App\Livewire\Website;

use App\Models\HairStyle;
use Livewire\Component;
use Livewire\WithPagination;

class AllHairstyles extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.website.all-hairstyles', [
            'hairstyles' => HairStyle::paginate(6)
        ]);
    }
}
