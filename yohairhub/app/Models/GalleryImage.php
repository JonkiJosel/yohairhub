<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'salon_hair_style_id',
        'image_path',
    ];

    // Define the relationship with SalonHairStyle
    public function salonHairStyle()
    {
        return $this->belongsTo(SalonHairStyle::class);
    }
}
