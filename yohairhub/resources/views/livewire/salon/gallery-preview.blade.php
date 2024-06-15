<div wire:poll>
    <div class="grid grid-cols-12 gap-4 mt-5">
        @forelse ($images as $image)
            <div class="col-span-4 shadow-lg rounded-lg overflow-hidden relative group">
                <img src="{{ asset('storage/' . $image->image_path) }}"
                    class="w-full h-48 object-cover transform transition-transform duration-300 group-hover:scale-105" />

                <div class="p-4 bg-white flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-semibold">{{ $image->salonHairStyle->hairStyle->name }}</h3>
                        <p class="text-gray-600">UGX {{ $image->salonHairStyle->custom_price }}</p>
                    </div>
                    <div class="flex space-x-2">
                        <a href="{{ asset('storage/' . $image->image_path) }}" download
                            class="text-gray-500 hover:text-blue-500">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 12v8a2 2 0 002 2h12a2 2 0 002-2v-8M16 6l-4 4m0 0l-4-4m4 4V2"></path>
                            </svg>
                        </a>
                        @if (auth()->user()->hasRole('admin') || auth()->user()->id == $this->salon->owner_id)
                            <button wire:click="deleteImage({{ $image->id }})"
                                class="text-gray-500 hover:text-blue-500">
                                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                </svg>
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <p class="col-span-12 text-center text-gray-500">No images yet</p>
        @endforelse
    </div>


</div>
