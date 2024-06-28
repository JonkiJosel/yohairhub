<?php

namespace App\Livewire\Salon;

use App\Mail\ImageDeletedNotification;
use App\Models\HairStyle;
use Livewire\Component;
use App\Models\GalleryImage;
use Illuminate\Support\Facades\Mail;
use Livewire\WithFileUploads;

class AdminHairStyleGallery extends Component
{
    use WithFileUploads;

    public $hairstyles;
    public $selectedHairstyle;
    public $selectedImage;
    public $galleryImages = [];

    public $newImage;


    public function updatedSelectedHairstyle($hairstyleId)
    {
        $this->selectedImage = null;
        $this->galleryImages = [];

        $hairstyle = HairStyle::find($hairstyleId);
        if ($hairstyle) {
            $this->galleryImages = $hairstyle->salons()
                ->with('galleryImages')
                ->get()
                ->pluck('galleryImages')
                ->flatten()
                ->map(function ($image) {
                    return [
                        'id' => $image->id,
                        'image_path' => $image->image_path,
                        'salon_name' => $image->salonHairStyle->salon->name,
                        'salon_address' => $image->salonHairStyle->salon->address
                    ];
                })
                ->toArray();
        }
    }

    public function saveImage()
    {
        if ($this->selectedHairstyle && $this->selectedImage) {
            $hairstyle = HairStyle::find($this->selectedHairstyle);
            if ($hairstyle) {
                $hairstyle->model_image_path = $this->selectedImage;
                $hairstyle->save();

                noty()->addSuccess('Model image updated successfully.');
            }
        }
    }

    public function removeImage()
    {
        if ($this->selectedHairstyle) {
            $hairstyle = HairStyle::find($this->selectedHairstyle);
            if ($hairstyle) {
                $hairstyle->model_image_path = null;
                $hairstyle->save();

                noty()->addSuccess('Model image removed successfully.');
            }
        }
    }


    public function deleteImage($imageId)
    {
        $image = GalleryImage::find($imageId);
        if ($image) {
            // Send email notification to salon owner
            $salon = $image->salonHairStyle->salon;
            $salonOwnerEmail = $salon->owner->user->email;
            Mail::to($salonOwnerEmail)->send(new ImageDeletedNotification($salon, $image));

            // Delete the image
            $image->delete();

            noty()->addSuccess('Image deleted successfully and notification sent to salon owner.');
        } else {
            noty()->addError('Image not found or could not be deleted.');
        }
    }


    public function uploadImage()
    {
        $this->validate([
            'newImage' => 'required|image|max:1024', // Adjust max file size as necessary
        ]);

        $hairstyle = HairStyle::find($this->selectedHairstyle);
        if ($hairstyle) {
            $path = $this->newImage->store('hair_styles', 'public');
            $hairstyle->model_image_path =  $path;
            $hairstyle->save();

            noty()->addSuccess('New model image uploaded successfully.');
            $this->newImage = null;
        }
    }


    public function render()
    {
        $this->hairstyles = HairStyle::with('salons.galleryImages')->get();

        return view('livewire.salon.admin-hair-style-gallery');
    }
}
