<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="{{ route('dashboard') }}"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Home
                        </a>
                    </li>
                </ol>
            </nav>
        </div>

    </x-slot>

    <div class="py-4 px-10">
        @livewire('dashboard.bookings-today')
        <x-section-border />
        @livewire('dashboard.new-booking-requests')
        <x-section-border />
        @if (auth()->user()->hasRole('admin'))
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <livewire:dashboard.total-salons-card />
                <livewire:dashboard.salons-by-gender-card />
                <livewire:dashboard.unique-cities-card />
                <livewire:dashboard.featured-salons-card />
                <livewire:dashboard.total-users-card />
                <livewire:dashboard.unique-customer-emails-card />
                <livewire:dashboard.unique-salon-owners-card />
                <livewire:dashboard.total-hairstyles-card />
            </div>
            <x-section-border />
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <livewire:dashboard.trending-hairstyles />
                <livewire:dashboard.trending-salons />
            </div>
            <x-section-border />

            @livewire('dashboard.salons-created-per-month')
       
        @endif

        <livewire:dashboard\bookings-today />

    </div>
</x-app-layout>
