<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salon extends Model
{
    use HasFactory,  SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'city',
        'image',
        'phone',
        'description',
        'gender_accepted',
        'uuid',
        'rating',
        'is_featured',
    ];

    /**
     * The users that belong to the salon.
     */
    // public function hairdressers()
    // {
    //     return $this->belongsToMany(User::class);
    // }

    public function owner()
    {
        return $this->hasOne(SalonUser::class)->where('is_owner', true)->with('user');
    }

    public function hairdressers()
    {
        return $this->hasMany(SalonUser::class)->withTrashed();
    }

    public function services()
    {
        return $this->hasMany(SalonService::class);
    }

    public function hairStyles()
    {
        return $this->hasMany(SalonHairStyle::class);
    }

    public function galleryImages()
    {
        return $this->hasManyThrough(GalleryImage::class, SalonHairStyle::class, 'salon_id', 'salon_hair_style_id', 'id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(SalonComment::class);
    }
}
