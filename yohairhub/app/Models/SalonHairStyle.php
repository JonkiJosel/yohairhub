<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalonHairStyle extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['salon_id', 'hairstyle_id', 'custom_price'];
}
