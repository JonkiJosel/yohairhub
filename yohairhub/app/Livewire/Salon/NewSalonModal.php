<?php

namespace App\Livewire\Salon;

use Livewire\Component;

class NewSalonModal extends Component
{
    public $newSalonModal_isOpen = false;

    public function render()
    {
        return view('livewire.salon.new-salon-modal');
    }

    public function openNewSalonModal()
    {
        $this->newSalonModal_isOpen = true;
    }

    public function closeNewSalonModal()
    {
        $this->newSalonModal_isOpen = false;
    }
}
