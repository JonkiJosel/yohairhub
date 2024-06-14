<?php

namespace App\Livewire\Salon;

use Livewire\Component;
use App\Models\SalonService;
use Illuminate\Support\Facades\Auth;

class EditSalonServiceModal extends Component
{
    public $service;
    public $showEditServiceModal = false;
    public $name;
    public $description;
    public $price;

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string|max:1000',
        'price' => 'required|numeric|min:0',
    ];

    public function mount($service)
    {
        $this->service = $service;
        $this->name = $service->name;
        $this->description = $service->description;
        $this->price = $service->price;
    }

    public function openServiceModal()
    {
        $this->showEditServiceModal = true;
    }

    public function closeModal()
    {
        $this->showEditServiceModal = false;
    }

    public function updateService()
    {
        $this->validate();



        $this->service->update([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
        ]);

        noty()->addSuccess('Service updated successfully.');

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.salon.edit-salon-service-modal');
    }
}
