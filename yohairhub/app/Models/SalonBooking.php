<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalonBooking extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'salon_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'reservation_date',
        'reservation_time',
        'salon_hair_style_id',
        'salon_service_id',
        'special_requests',
        'salon_user_id',
        'confirmed_at',
        'cancelled_at',
        'cancel_reason',
    ];

    public function salon()
    {
        return $this->belongsTo(Salon::class);
    }

    public function hairstyle()
    {
        return $this->belongsTo(SalonHairStyle::class, 'salon_hair_style_id');
    }

    public function service()
    {
        return $this->belongsTo(SalonService::class, 'salon_service_id');
    }
}
