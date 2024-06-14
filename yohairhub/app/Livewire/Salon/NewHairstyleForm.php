<?php

namespace App\Livewire\Salon;

use Livewire\Component;

class NewHairstyleForm extends Component
{
    public $name;
    public $price;
    public $salon;

    

    public function render()
    {
        return view('livewire.salon.new-hairstyle-form');
    }

    public function saveHairStyle()
    {

        noty()->addSuccess('Saved');
    }
}
