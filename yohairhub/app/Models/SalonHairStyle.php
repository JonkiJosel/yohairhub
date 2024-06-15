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

    public function hairStyle()
    {
        return $this->belongsTo(HairStyle::class);
    }
}
