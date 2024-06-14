<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HairStyle extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description', 'model_image_path'];

    // Define the relationship with Salons through the pivot table
    public function salons()
    {
        return $this->belongsToMany(Salon::class, 'salon_hairstyle');
    }
}
