<div wire:poll class="p-4 dark:bg-gray-800 rounded-lg shadow-md transition duration-300">

    @include('livewire.partials.single-salon-header')

    {{-- Filter and Search --}}
    <div class="flex justify-between items-center mb-4">
        <div>
            <input wire:model.debounce.300ms="search" type="text" placeholder="Search by customer name, email, or phone"
                class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500">
        </div>
        <div>
            <label for="startDate" class="text-gray-600">From:</label>
            <input wire:model.lazy="startDate" type="date" id="startDate"
                class="px-2 py-1 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500">
        </div>
        <div>
            <label for="endDate" class="text-gray-600">To:</label>
            <input wire:model.lazy="endDate" type="date" id="endDate"
                class="px-2 py-1 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500">
        </div>
        <div>
            <button wire:click="clearFilters"
                class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 focus:outline-none">Clear
                Filters
            </button>
        </div>
        <div class="flex justify-end mb-4">
            <button wire:click="toggleIncludeSoftDeleted"
                class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none">
                {{ $includeSoftDeleted ? 'Hide Deleted' : 'Show Deleted' }}
            </button>
        </div>
        
    </div>

    {{-- Bookings Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        @forelse ($bookings as $booking)
            <div
                class="{{ $booking->statusClass }} bg-white dark:bg-gray-900 shadow-md rounded-lg overflow-hidden transition duration-300">
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">{{ $booking->customer_name }}</h3>
                    <p class="text-sm text-gray-600 mb-2">Contact: {{ $booking->customer_phone ?? 'Na.' }}
                        {{ $booking->customer_email ?? 'Na.' }}</p>
                    <p class="text-sm text-gray-600 mb-2">Date: {{ $booking->reservation_date }}</p>
                    <p class="text-sm text-gray-600 mb-2">Time: {{ $booking->reservation_time ?? 'Not specified' }}</p>
                    <p class="text-sm text-gray-600 mb-2">Hairstyle:
                        {{ optional($booking->hairstyle)->hairstyle->name ?? 'Not specified' }}</p>
                    <p class="text-sm text-gray-600 mb-2">Service:
                        {{ optional($booking->service)->name ?? 'Not specified' }}</p>
                    <p class="text-sm text-gray-600 mb-2">Attendee:
                        {{ $booking->salonUser ? $booking->salonUser->user->name : 'Not specified' }}</p>
                    <div class="mt-4 flex justify-end space-x-2">
                        @if (!$booking->confirmed_at)
                            <x-button wire:confirm="Are you sure?" wire:loading.attr="disabled"
                                wire:click="confirmBooking({{ $booking->id }})"
                                class="px-4 py-2 rounded-lg hover:bg-green-600 focus:outline-none">Confirm
                            </x-button>
                        @endif

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
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-white dark:bg-gray-900 shadow-md rounded-lg p-4">
                <p class="text-lg text-center text-gray-600">No bookings found</p>
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $bookings->links() }}
    </div>

</div>
