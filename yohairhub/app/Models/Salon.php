<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
    ];

    /**
     * The users that belong to the salon.
     */
    public function hairdressers()
    {
        return $this->belongsToMany(User::class);
    }
}
