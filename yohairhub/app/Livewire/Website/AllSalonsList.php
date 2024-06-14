<?php

namespace App\Livewire\Website;

use App\Models\Salon;
use Livewire\Component;
use Livewire\WithPagination;

class AllSalonsList extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.website.all-salons-list',[
            'salons'=>Salon::paginate(7)
        ]);
    }
}
