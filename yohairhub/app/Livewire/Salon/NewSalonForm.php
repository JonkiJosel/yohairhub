<?php

namespace App\Livewire\Salon;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Salon;
use App\Models\SalonUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;

class NewSalonForm extends Component
{
    use WithFileUploads;

    #[Validate('required|min:3|max:50', as: 'salon name')]
    public $salon_name = '';
    #[Validate('required|min:3|max:50', as: 'address')]
    public $salon_address = '';
    #[Validate('required|min:3|max:50', as: 'city')]
    public $salon_city = '';
    #[Validate('nullable|sometimes|image|mimes:jpeg,png,jpg,gif|max:2048', as: 'salon image')]
    public $salon_image = null;
    #[Validate('nullable|sometimes|min:3|max:50', as: 'description')]
    public $salon_description = '';
    #[Validate('required|min:3|max:50', as: 'accepted gender')]
    public $gender_accepted = '';

    #[Validate('nullable|sometimes|min:10|max:15', as: 'phone')]
    public $salon_phone = '';



    public function createSalon()
    {
        $validatedData = $this->validate();

        // store the image if it exists
        if ($this->salon_image) {
            $imagePath = $this->salon_image->store('salon_images', 'public');
        }

        // create the salon
        $salon = new Salon();
        $salon->name = $validatedData['salon_name'];
        $salon->address = $validatedData['salon_address'];
        $salon->city = $validatedData['salon_city'];
        $salon->image = $imagePath ?? null;
        $salon->phone = $validatedData['salon_phone'] ?? null;
        $salon->description = $validatedData['salon_description'] ?? null;
        $salon->gender_accepted = $validatedData['gender_accepted'];

        $salon->save();

        // $salon->hairdressers()->create(['is_owner' => true, 'user_id' => auth()->user()->id]);
        SalonUser::create([
            'is_owner' => true, 
            'user_id' => auth()->user()->id,
            'salon_id' => $salon->id,
        ]);

        $this->dispatch('salonCreated');

        $this->reset();
    }
    public function render()
    {
        return view('livewire.salon.new-salon-form');
    }
}
