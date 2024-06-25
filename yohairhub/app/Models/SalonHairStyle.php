<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalonHairStyle extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'salon_id',
        'hair_style_id',
        'custom_price'
    ];

    // Relationship with Salon
    public function salon()
    {
        return $this->belongsTo(Salon::class);
    }

    public function hairStyle()
    {
        return $this->belongsTo(HairStyle::class);
    }

    // Relationship with GalleryImage
    public function galleryImages()
    {
        return $this->hasMany(GalleryImage::class, 'salon_hair_style_id');
    }
}
