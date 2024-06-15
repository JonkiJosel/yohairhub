<?php

namespace App\Livewire\Salon;

use App\Models\HairStyle;
use App\Models\SalonHairStyle;
use Livewire\Component;
use Illuminate\Support\Str;


class NewHairstyleForm extends Component
{
    public $name;
    public $price;
    public $salon;

    public function mount($salon)
    {
        $this->salon = $salon;
    }

    public function render()
    {
        return view('livewire.salon.new-hairstyle-form', [
            'hairStyles' => HairStyle::all()
        ]);
    }

    public function saveHairStyle()
    {
        $this->validate([
            'name' => "required",
            'price' => "required|numeric",
        ]);

        // Check if the hairstyle already exists
        $existingStyle = HairStyle::where('name', $this->name)->first();

        if ($existingStyle) {
            // Hairstyle exists, so associate it with the salon
            SalonHairStyle::create([
                'salon_id' => $this->salon->id,
                'hair_style_id' => $existingStyle->id,
                'custom_price' => $this->price,
            ]);

            noty()->addSuccess('Hairstyle already exists. Associated with your salon.');
        } else {
            // Hairstyle does not exist, create a new one
            $style = HairStyle::create([
                'name' => $this->name,
                'description' => Str::slug($this->name),
            ]);

            SalonHairStyle::create([
                'salon_id' => $this->salon->id,
                'hair_style_id' => $style->id,
                'custom_price' => $this->price,
            ]);

            noty()->addSuccess('New hairstyle created and associated with your salon.');
        }

        // Reset the input fields
        $this->reset(['name', 'price']);
    }
}
