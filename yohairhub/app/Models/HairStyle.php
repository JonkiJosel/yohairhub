<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HairStyle extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description', // slug of name
        'model_image_path' // image to show on top
    ];

    // Define the relationship with Salons through the pivot table
    public function salons()
    {
        return $this->hasMany(SalonHairStyle::class);
    }

    // Fetch a random gallery image if model_image_path is not available
    public function getRandomGalleryImage()
    {
        $galleryImages = $this->salons()
            ->with('galleryImages')
            ->get()
            ->pluck('galleryImages')
            ->flatten();

        if ($galleryImages->isEmpty()) {
            return null;
        }

        return $galleryImages->random();
    }

    // all gallery images
    public function getGalleryImages()
    {
        return $this->salons()
            ->with('galleryImages')
            ->get()
            ->pluck('galleryImages')
            ->flatten();
    }
}
