<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalonUser extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $table = 'salon_user';

    protected $fillable = [
        'salon_id',
        'user_id',
        'is_owner',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function salon(){
        return $this->belongsTo(Salon::class);
    }
}
