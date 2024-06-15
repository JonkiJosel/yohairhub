<?php

namespace App\Livewire\Website;

use Livewire\Component;

class SingleSalonGallery extends Component
{
    public $salon;
    public function mount($salon)
    {
        $this->salon = $salon;
    }
    public function render()
    {
        return view('livewire.website.single-salon-gallery');
    }
}
