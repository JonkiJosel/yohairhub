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

    protected $dates = ['reservation_date', 'reservation_time', 'confirmed_at', 'cancelled_at'];

    public function salon()
    {
        return $this->belongsTo(Salon::class);
    }

    public function hairstyle()
    {
        return $this->belongsTo(SalonHairStyle::class, 'salon_hair_style_id');
    }

    public function salonUser()
    {
        return $this->belongsTo(SalonUser::class, 'salon_user_id');
    }

    public function service()
    {
        return $this->belongsTo(SalonService::class, 'salon_service_id');
    }

    /**
     * Scope a query to order reservations by date and time.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $orderDirection
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOrderByDate($query, $orderDirection = 'asc')
    {
        return $query->orderBy('reservation_date', $orderDirection)
            ->orderBy('reservation_time', $orderDirection);
    }

    /**
     * Scope a query to filter reservations by a specific date range.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $startDate
     * @param string $endDate
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDateRange($query, $startDate, $endDate)
    {
        return $query->whereBetween('reservation_date', [$startDate, $endDate]);
    }

    /**
     * Scope a query to filter reservations by today's date.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeToday($query)
    {
        return $query->whereDate('reservation_date', today());
    }

    /**
     * Scope a query to filter reservations by this week.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeThisWeek($query)
    {
        return $query->whereBetween('reservation_date', [
            now()->startOfWeek(),
            now()->endOfWeek(),
        ]);
    }
}
