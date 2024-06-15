<div class="">
    <x-form-section submit="saveHairStyle">
        <!-- Title and Description Slots -->
        <x-slot name="title">
            New Hair Style
        </x-slot>

        <x-slot name="description">
            Add a new hairstyle to the system. <br>
            This will be available to all salons, but specific details can be attached to your salon only.
        </x-slot>

        <!-- Form Fields -->
        <x-slot name="form">
            <div class="col-span-6 grid grid-cols-12 gap-6">

                <!-- Hairstyle Name Field -->
                <div wire:ignore class="col-span-6">
                    <x-label for="name" value="Hairstyle Name" />
                    <select id="select_name"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        wire:model.defer="name">
                        <option value="">Select or type to add new</option>
                        @foreach ($hairStyles as $hairstyle)
                            <option value="{{ $hairstyle->name }}">{{ $hairstyle->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="name" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Base Price Field -->
                <div class="col-span-6">
                    <x-label for="price" value="Base Price (UGX)" />
                    <x-input id="price" type="number" step="0.01"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        wire:model.defer="price" />
                    <x-input-error for="price" class="mt-2 text-red-500 text-sm" />
                </div>

            </div>
        </x-slot>

        <!-- Action Buttons -->
        <x-slot name="actions">
            <x-secondary-button class="bg-gray-300 text-gray-700 hover:bg-gray-400"
                wire:click="$emit('closeModal')">Cancel</x-secondary-button>
            <x-button class="ml-2 bg-indigo-600 text-white hover:bg-indigo-700" type="submit">Save</x-button>
        </x-slot>
    </x-form-section>


    @script
        <script>
            $('#select_name').select2({
                tags: true,
            })
            $('#select_name').on('change', function(event) {
                let selectedValue = $(this).val();
                $wire.set('name', selectedValue);
            });
        </script>
    @endscript
</div>
