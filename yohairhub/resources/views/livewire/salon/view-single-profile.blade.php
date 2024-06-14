<div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md transition duration-300">

    @include('livewire.partials.single-salon-header')
    
    <!-- Salon Profile -->
    <div class="grid grid-cols-12 gap-6 mb-6 justify-center">
        <!-- Profile Information -->
        <div class="space-y-4 col-span-6 shadow p-10">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ $salon->name }}</h2>
            <p class="text-gray-600 dark:text-gray-300">{{ $salon->address }}, {{ $salon->city }}</p>
            <p class="text-gray-600 dark:text-gray-300">Phone: {{ $salon->phone }}</p>
            <p class="text-gray-600 dark:text-gray-300">{{ $salon->description }}</p>
            <p class="text-gray-600 dark:text-gray-300">Gender Accepted: {{ $salon->gender_accepted }}</p>
        </div>
        <!-- Profile Image -->
        <div class="col-span-6">
            <img src="{{ asset('storage/' . $salon->image) }}" alt="{{ $salon->name }}"
                class="h-64 rounded object-cover">
        </div>
    </div>

    <!-- Salon Services -->
    <div class="mb-6">
        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4">Services</h3>
        <ul class="grid grid-cols-3 gap-6">
            @forelse ($salon->services as $service)
                <li id="service-{{ $service->id }}" class="p-4 bg-gray-100 dark:bg-gray-700 rounded-lg shadow">
                    <h4 class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $service->name }}</h4>
                    <p class="text-gray-600 dark:text-gray-400">{{ $service->description }}</p>
                    <p class="text-gray-600 dark:text-gray-300 font-medium">${{ $service->price }}</p>
                    @if (auth()->check() && auth()->user()->id === $salon->owner->user->id)
                        <div class="mt-4 flex space-x-2">
                            <x-button wire:confirm="are you sure you want to delete this?"
                                wire:click="deleteService({{ $service->id }})">Delete</x-button>
                            @livewire('salon.edit-salon-service-modal', ['service' => $service], key('edit-ser-'.$service->id))
                        </div>
                    @endif

                </li>
            @empty
                <p class="text-gray-600 dark:text-gray-300">No services available.</p>
            @endforelse
        </ul>
    </div>

    <!-- Hairdressers -->
    <div>
        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4">Hairdressers</h3>
        <ul class="space-y-3 grid grid-cols-3 gap-6">
            @forelse ($salon->hairdressers as $hairdresser)
                <li class="p-4 bg-gray-100 dark:bg-gray-700 rounded-lg shadow">
                    <h4 class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $hairdresser->user->name }}
                    </h4>
                    @if ($hairdresser->is_owner)
                        <span class="text-sm text-blue-500 dark:text-blue-300 font-semibold">Owner</span>
                    @endif
                    <p class="text-gray-600 dark:text-gray-400">{{ $hairdresser->user->email }}</p>
                    @if (auth()->check() && auth()->user()->id === $salon->owner->user->id)
                        <div class="mt-4">
                            @if (!$hairdresser->trashed())
                                <x-danger-button
                                    wire:confirm="are you sure you want to fire {{ $hairdresser->user->name }}?"
                                    wire:click="fireHairDresser({{ $hairdresser->id }})">Fire</x-button>
                                @else
                                    <x-button
                                        wire:confirm="are you sure you want to resore {{ $hairdresser->user->name }}?"
                                        wire:click="restoreHairDresser({{ $hairdresser->id }})">Reset</x-button>
                            @endif
                        </div>
                    @endif
                </li>
            @empty
                <p class="text-gray-600 dark:text-gray-300">No hairdressers available.</p>
            @endforelse
        </ul>
    </div>
</div>
