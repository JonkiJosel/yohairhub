<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="flex-1 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="#" class="block">
            @if($salon->image)
                <img class="object-cover object-top rounded-t-lg h-64 w-full" src="{{ asset('storage/'.$salon->image) }}" alt="" loading="lazy" />
            @elseif($salon->gender_accepted == 'Unisex')
                <img class="object-cover object-top rounded-t-lg h-64 w-full" src="{{ asset('018dbb9f-9992-725d-975f-6c7421928a7b.jpg') }}" alt="" loading="lazy" />
            @else
                <img class="object-cover object-top rounded-t-lg h-64 w-full" src="{{ asset('018dbb9f-3daf-73f9-8bc3-0739dcd14a31.jpg') }}" alt="" loading="lazy" />
            @endif
        </a>
        <div class="p-5">
            <a href="#" class="block">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $salon->name }}</h5>
            </a>
            <p class="mb-3 text-gray-700 dark:text-gray-400">{{ $salon->description }}</p>
            <p class="text-gray-600 dark:text-gray-300">{{ $salon->address . ", " . $salon->city }}</p>
            <p class="text-gray-600 dark:text-gray-300">Phone: {{ $salon->phone }}</p>
            <p class="text-gray-600 dark:text-gray-300">Gender Accepted: {{ $salon->gender_accepted }}</p>
            <x-button wire:click="goToSalon({{ $salon->id }})" class="mt-3 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Go to salon
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </x-button>
        </div>
    </div>
</div>
