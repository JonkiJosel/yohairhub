<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalonComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'comment',
        'salon_id',
    ];

    public function salon(){
        return $this->belongsTo(Salon::class);
    }
}
