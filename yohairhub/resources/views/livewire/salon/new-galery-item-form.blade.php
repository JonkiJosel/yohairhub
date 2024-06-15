<div class="">
    <x-form-section submit="saveImage">
        <!-- Title and Description Slots -->
        <x-slot name="title">
            New Gallery Item
        </x-slot>

        <x-slot name="description">
            Add a new photo to show in your salon gallery <br>

        </x-slot>

        <!-- Form Fields -->
        <x-slot name="form">
            <div class="col-span-6 grid grid-cols-12 gap-6">

                <!-- Hairstyle Name Field -->
                {{-- <div wire:ignore class="col-span-6"> --}}
                <div class="col-span-6">
                    <x-label for="hair_style" value="Hairstyle Name" />
                    <select id="select_style"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        wire:model.defer="hair_style">
                        <option value="">Select or type to add new</option>
                        @foreach ($hairStyles as $hairstyle)
                            <option value="{{ $hairstyle->id }}">{{ $hairstyle->hairStyle->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="hair_style" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Base image Field -->
                <div class="col-span-6">
                    <x-label for="image" value="Image" />
                    <x-input id="image" type="file" step="0.01"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        wire:model.defer="image" />
                    <x-input-error for="image" class="mt-2 text-red-500 text-sm" />
                </div>
                
                @if ($image)
                    <div class="col-span-12">
                        <img class="w-full" src="{{ $image->temporaryUrl() }}" />
                    </div>
                @endif
            </div>
        </x-slot>

        <!-- Action Buttons -->
        <x-slot name="actions">
            <span class="text-green-500 my-2" wire:loading>
                loading... pleaase wait
            </span>
            <x-secondary-button class="bg-gray-300 text-gray-700 hover:bg-gray-400"
                wire:click="$emit('closeModal')">Cancel</x-secondary-button>
            <x-button wire:loading.attr="disabled" class="ml-2 bg-indigo-600 text-white hover:bg-indigo-700" type="submit">Save</x-button>
        </x-slot>
    </x-form-section>


    {{-- @script
        <script>
            $('#select_style').select2({
                tags: false,
            })
            $('#select_style').on('change', function(event) {
                let selectedValue = $(this).val();
                $wire.set('name', selectedValue);
            });
        </script>
    @endscript --}}
</div>
