<?php

namespace App\Livewire\Salon;

use App\Models\Salon;
use Livewire\Component;

class ManageHairstyles extends Component
{
    public $salon;

    public function mount(Salon $salon)
    {
        $this->salon = $salon;
    }
    public function render()
    {
        return view('livewire.salon.manage-hairstyles');
    }
}
