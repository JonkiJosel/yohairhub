<div class="container mx-auto p-4">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold mb-4">Select Model Image for Hairstyles</h2>

        <div class="mb-4">
            <label for="hairstyle" class="block mb-2">Select Hairstyle:</label>
            <select wire:model.live="selectedHairstyle" id="hairstyle" class="block w-full p-2 border rounded">
                <option value="">-- Select a Hairstyle --</option>
                @foreach ($hairstyles as $hairstyle)
                    <option value="{{ $hairstyle->id }}">{{ $hairstyle->name }}</option>
                @endforeach
            </select>
        </div>

        @if ($selectedHairstyle)
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label for="newImage" class="block mb-2">Upload New Model Image:</label>
                    <input type="file" wire:model="newImage" id="newImage" class="block w-full p-2 border rounded">
                    @error('newImage')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    @if ($newImage)
                        <img src="{{ $newImage->temporaryUrl() }}" alt="New Image" class="w-24 h-24 object-cover mb-2">
                    @else
                        @php
                            $hairStyle = \App\Models\HairStyle::find($selectedHairstyle);
                            $image = $hairStyle->model_image_path;
                        @endphp
                        <div>
                            @if ($image)
                                <img src="{{ asset('storage/' . $image) }}" alt="Existing Image"
                                    class="w-24 h-24 object-cover mb-2">
                            @else
                                <p>No image found.</p>
                            @endif
                        </div>

                    @endif

                </div>
            </div>

            <button wire:click="uploadImage"
                class="block w-full px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 mt-4">
                Save Image
            </button>

            <span class="text-green-500 block my-2" wire:loading wire:target="newImage">Loading... Please wait</span>
        @endif

        @if ($galleryImages)
            <h3 class="text-xl font-semibold mt-6 mb-2">Select an Image:</h3>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                @foreach ($galleryImages as $image)
                    <div class="border rounded-lg overflow-hidden">
                        <img src="{{ asset('storage/' . $image['image_path']) }}" alt="Gallery Image"
                            class="w-full h-48 object-cover cursor-pointer {{ $selectedImage === $image['image_path'] ? 'border-2 border-blue-500' : '' }}"
                            wire:click="$set('selectedImage', '{{ $image['image_path'] }}')">
                        <div class="p-2 text-sm text-gray-600">
                            <div><strong>Salon:</strong> {{ $image['salon_name'] }}</div>
                            <div><strong>Address:</strong> {{ $image['salon_address'] }}</div>
                            <div>
                                <x-button wire:click="deleteImage({{ $image['id'] }})" wire:loading.attr="disabled">
                                    Delete
                                </x-button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($selectedImage)
                <div class="mt-4">
                    <h3 class="text-lg font-semibold">Selected Image:</h3>
                    <img src="{{ asset('storage/' . $selectedImage) }}" alt="Selected Image"
                        class="w-full object-cover">
                </div>
                <div class="mt-4">
                    <button wire:click="saveImage"
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Set Model Image</button>
                    <button wire:click="removeImage"
                        class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Remove Model Image</button>
                </div>
            @endif
        @endif

        @if (session()->has('success'))
            <div class="mt-4 p-4 bg-green-200 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif
    </div>
</div>
