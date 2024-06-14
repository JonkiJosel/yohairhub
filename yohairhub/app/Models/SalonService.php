<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalonService extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'salon_id'];

    /**
     * Get the salon that owns the service.
     */
    public function salon()
    {
        return $this->belongsTo(Salon::class);
    }
}
