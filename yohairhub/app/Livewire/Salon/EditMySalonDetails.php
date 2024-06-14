<?php

namespace App\Livewire\Salon;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Salon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;

class EditMySalonDetails extends Component
{
    use WithFileUploads;

    public $salon; // Property to hold the salon being edited

    #[Validate('required|min:3|max:50', as: 'salon name')]
    public $salon_name;
    #[Validate('required|min:3|max:50', as: 'address')]
    public $salon_address;
    #[Validate('required|min:3|max:50', as: 'city')]
    public $salon_city;
    #[Validate('nullable|sometimes|image|mimes:jpeg,png,jpg,gif|max:2048', as: 'salon image')]
    public $salon_image;
    #[Validate('nullable|sometimes|min:3|max:50', as: 'description')]
    public $salon_description; 
    #[Validate('required|min:3|max:50', as: 'accepted gender')]
    public $gender_accepted;

    #[Validate('nullable|sometimes|min:10|max:15', as: 'phone')]
    public $salon_phone;

    public function mount(Salon $salon)
    {
        $this->salon = $salon; // Load the salon details
        // dd($this->salon);
        // Set the form fields with the salon details
        $this->salon_name = $salon->name;
        $this->salon_address = $salon->address;
        $this->salon_city = $salon->city;
        $this->salon_description = $salon->description;
        $this->gender_accepted = $salon->gender_accepted;
        $this->salon_phone = $salon->phone;
    }

    public function updateSalon()
    {
        $validatedData = $this->validate();

        // Update salon details
        $this->salon->update([
            'name' => $validatedData['salon_name'],
            'address' => $validatedData['salon_address'],
            'city' => $validatedData['salon_city'],
            'description' => $validatedData['salon_description'],
            'gender_accepted' => $validatedData['gender_accepted'],
            'phone' => $validatedData['salon_phone']
        ]);

        // Check if image is uploaded and update if necessary
        if ($this->salon_image) {
            $imagePath = $this->salon_image->store('salon_images', 'public');
            $this->salon->update(['image' => $imagePath]);
        }

        $this->dispatch('salonUpdated'); // Dispatch event after updating

        noty()->addSuccess('Salon updated successfully.');

        // return redirect()->route('salon.show', $this->salon->id);
    }


    public function render()
    {
        return view('livewire.salon.edit-my-salon-details');
    }
}
