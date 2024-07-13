<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\SalonBooking;
use Illuminate\Support\Facades\DB;

class TrendingHairstyles extends Component
{
    public $trendingHairstyles;

    public function mount()
    {
        $this->trendingHairstyles = SalonBooking::select('salon_hair_style_id', DB::raw('COUNT(*) as bookings_count'))
            ->whereMonth('created_at', now()->month)
            ->groupBy('salon_hair_style_id')
            ->orderByDesc('bookings_count')
            ->take(10)
            ->get();

        // $this->trendingHairstyles = SalonBooking::whereMonth('created_at', now()->month)->get();
        

        // Load relationships to avoid N+1 queries if necessary
        $this->trendingHairstyles->load('hairstyle');
    }

    public function render()
    {
        return view('livewire.dashboard.trending-hairstyles');
    }
}
