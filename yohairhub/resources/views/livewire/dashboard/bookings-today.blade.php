<div class="p-4 bg-white rounded shadow" wire:poll>
    <div class="flex flex-col md:flex-row justify-between">
        <div>
            <h2 class="text-xl font-semibold mb-4">
                {{ $showDaily ? "Today's Bookings" : "This Week's Bookings" }} ({{ now()->format('Y-m-d') }})
            </h2>
        </div>
        <div class="mb-4 md:mb-0">
            <x-button wire:click="toggleView">
                {{ $showDaily ? 'Show Weekly' : 'Show Daily' }}
            </x-button>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Time
                    </th>
                    <th scope="col"
                        class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Customer
                    </th>
                    <th scope="col"
                        class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Salon
                    </th>
                    <th scope="col"
                        class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Service
                    </th>
                    <th scope="col"
                        class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Hairstyle
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($bookings as $booking)
                    <tr>
                        <td class="px-2 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $booking->reservation_time }}</div>
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $booking->customer_name }}</div>
                            <div class="text-xs text-gray-500">{{ $booking->customer_email }}</div>
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $booking->salon->name }}</div>
                            <div class="text-xs text-gray-500">{{ $booking->salon->city }}</div>
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap">
                            @if ($booking->service)
                                <div class="text-sm text-gray-900">{{ $booking->service->name }}</div>
                                <div class="text-xs text-gray-500">Price: Ugx
                                    {{ number_format($booking->service->price, 2) }}</div>
                            @else
                                <div class="text-sm text-gray-900">N/A</div>
                            @endif
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap">
                            @if ($booking->hairstyle)
                                <div class="text-sm text-gray-900">{{ $booking->hairstyle->hairStyle->name }}</div>
                                <div class="text-xs text-gray-500">Price: Ugx
                                    {{ number_format($booking->hairstyle->custom_price, 2) }}</div>
                            @else
                                <div class="text-sm text-gray-900">N/A</div>
                            @endif
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap">
                            <x-secondary-button wire:confirm="Are you sure?" wire:loading.attr="disabled"
                                wire:click="completeBooking({{ $booking->id }})"
                                class="px-4 py-2 bg-green-500 rounded-lg hover:bg-green-600 focus:outline-none">Complete
                            </x-secondary-button>
                            @if (!$booking->cancelled_at)
                                <x-danger-button wire:confirm="Are you sure?" wire:loading.attr="disabled"
                                    wire:click="cancelBooking({{ $booking->id }})"
                                    class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 focus:outline-none">Cancel
                                </x-danger-button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if ($bookings->isEmpty())
        <div class="mt-4 text-gray-500 text-sm">No bookings for today.</div>
    @endif
</div>
