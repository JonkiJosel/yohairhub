<?php

namespace App\Livewire\Salon;

use App\Models\GalleryImage;
use App\Models\SalonHairStyle;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class GalleryPreview extends Component
{
    public $salon;

    public function mount($salon)
    {
        $this->salon = $salon;
    }
    public function render()
    {
        $hairstyles = SalonHairStyle::where('salon_id', $this->salon->id)->get();
        return view('livewire.salon.gallery-preview', [
            'images' => GalleryImage::whereIn('salon_hair_style_id', $hairstyles->pluck('id')->toArray())->get()
        ]);
    }

    public function deleteImage($id)
    {
        $user = Auth::user();

        // Check if the user is an admin or the salon owner
        if ($user->hasRole('admin') || $user->id == $this->salon->owner_id) {
            $image = GalleryImage::find($id);

            if ($image) {
                // Delete the image file from storage
                \Storage::delete('public/' . $image->image_path);

                // Delete the image record from the database
                $image->delete();

                // Notify the user
                noty()->addSuccess('Image deleted successfully.');
            }
        } else {
            noty()->addError('You do not have permission to delete this image.');
        }
    }
}
