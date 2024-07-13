<div class="p-6 bg-white rounded-lg shadow">
    <h2 class="text-xl font-semibold mb-4">Trending Hairstyles This Month</h2>
    <ul>
        @foreach ($trendingHairstyles as $trendingHairstyle)
            <li>{{ $trendingHairstyle->hairstyle->hairstyle->name }} - {{ $trendingHairstyle->bookings_count }} bookings</li>
        @endforeach
    </ul>
</div>