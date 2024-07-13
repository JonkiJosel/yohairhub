<?php

namespace App\Livewire\Dashboard;

// app/Http/Livewire/Dashboard/TrendingSalons.php

use Livewire\Component;
use App\Models\SalonBooking;
use App\Models\Salon;
use Illuminate\Support\Facades\DB;

class TrendingSalons extends Component
{
    public $trendingSalons;

    public function mount()
    {
        $this->trendingSalons = SalonBooking::select('salon_id', DB::raw('COUNT(*) as bookings_count'))
            ->whereMonth('created_at', now()->month)
            ->groupBy('salon_id')
            ->orderByDesc('bookings_count')
            ->take(10)
            ->get();

        // Load relationships to avoid N+1 queries if necessary
        $this->trendingSalons->load('salon');
    }

    public function render()
    {
        return view('livewire.dashboard.trending-salons');
    }
}
