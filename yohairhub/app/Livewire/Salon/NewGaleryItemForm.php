<?php

namespace App\Livewire\Salon;

use App\Models\GalleryImage;
use App\Models\SalonHairStyle;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewGaleryItemForm extends Component
{
    use WithFileUploads;

    public $salon;

    public $image;
    public $hair_style;

    public function mount($salon)
    {
        $this->salon = $salon;
    }

    public function render()
    {
        return view('livewire.salon.new-galery-item-form', [
            'hairStyles' => SalonHairStyle::where('salon_id', $this->salon->id)->get()
        ]);
    }

    public function saveImage()
    {
        $this->validate([
            'hair_style' => "required|exists:salon_hair_styles,id",
            'image' => "required|file|image",
        ]);

        $image_path =  $this->image->store('hair_styles', 'public');

        GalleryImage::create([
            'salon_hair_style_id' => $this->hair_style,
            'image_path' => $image_path,
        ]);

        noty()->addSuccess('Saved');
        $this->reset('hair_style', 'image');
    }
}
