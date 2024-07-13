<div class="p-6 bg-white rounded-lg shadow">
    <h2 class="text-xl font-semibold mb-4">Trending Salons This Month</h2>
    <ul>
        @foreach ($trendingSalons as $trendingSalon)
            <li>{{ $trendingSalon->salon->name }} - {{ $trendingSalon->bookings_count }} bookings</li>
        @endforeach
    </ul>
</div>