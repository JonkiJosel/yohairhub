<?php

namespace App\Livewire\Salon;

use App\Models\Salon;
use Livewire\Component;

class MySalonCard extends Component
{
    public $salon;

    public function mount(Salon $salon)
    {
        $this->salon = $salon;
    }


    public function render()
    {
        return view('livewire.salon.my-salon-card');
    }

    public function goToSalon(Salon $salon)
    {
        $salon = $salon;
        return redirect()->route('salon.show.single', $salon); ;
    }
}
