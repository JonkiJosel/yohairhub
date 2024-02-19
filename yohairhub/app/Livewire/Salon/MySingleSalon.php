<?php

namespace App\Livewire\Salon;

use Livewire\Component;
use App\Models\Salon;

class MySingleSalon extends Component
{
    public $salon;

    public function mount(Salon $salon)
    {
        $this->salon = $salon;
    }
    public function render()
    {
        return view('livewire.salon.my-single-salon');
    }
}
