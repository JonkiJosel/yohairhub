<?php

namespace App\Livewire\Salon;

use Livewire\Component;
use App\Models\Salon;
use App\Models\SalonService;

class AddService extends Component
{
    public $salon; // Public property to hold the salon

    public $name;
    public $description;
    public $price;

    // Mount method to accept the salon when initializing the component
    public function mount($salonId)
    {
        $this->salon = Salon::findOrFail($salonId->id);
        // dd($this->salon);
    }

    public function addService()
    {
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        SalonService::create([
            'name' => $this->name, 
            'description' => $this->description, 
            'price' => $this->price, 
            'salon_id' => $this->salon->id, 
        ]);

        $this->dispatch('serviceAdded'); 

        $this->reset(['name','description','price']); 
    }
    public function render()
    {
        return view('livewire.salon.add-service');
    }
}
