<?php

namespace App\Livewire\Salon;

use Livewire\Component;
use App\Models\Salon;

class AddService extends Component
{
    public $salon; // Public property to hold the salon

    public $name;
    public $description;
    public $price;

    // Mount method to accept the salon when initializing the component
    public function mount(Salon $salon)
    {
        $this->salon = $salon;
    }

    public function addService()
    {
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        $this->salon->services()->create($validatedData);

        $this->dispatch('serviceAdded'); 

        $this->reset(); 
    }
    public function render()
    {
        return view('livewire.salon.add-service');
    }
}
