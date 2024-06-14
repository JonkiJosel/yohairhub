<div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md transition duration-300">

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
                    <li>
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <a href="{{ route('salon.show') }}"
                                class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">My
                                Saloon</a>
                        </div>
                    </li>

                    <li>
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <a href="{{ route('salon.show') }}"
                                class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">{{ $salon->name }}</a>
                        </div>
                    </li>
                </ol>
            </nav>


            <div class="flex items-center space-x-4">
                <a href="{{ route('salon.show.single.profile', $salon) }}"
                    class="text-gray-700 hover:text-blue-500 font-medium transition duration-300 border-b-2 border-transparent hover:border-blue-500">
                    Profile
                </a>
                <a href="{{ route('salon.show.single', $salon) }}"
                    class="text-gray-700 hover:text-blue-500 font-medium transition duration-300 border-b-2 border-transparent hover:border-blue-500">
                    Edit
                </a>
            </div>

        </div>
    </x-slot>
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
