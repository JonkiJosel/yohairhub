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
    ];

    /**
     * The users that belong to the salon.
     */
    public function hairdressers()
    {
        return $this->belongsToMany(User::class);
    }


    
}
