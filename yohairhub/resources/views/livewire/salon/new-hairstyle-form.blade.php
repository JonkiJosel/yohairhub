<div>
    {{-- Stop trying to control. --}}
    <x-form-section submit="">
        <x-slot name="title">New Hair Style</x-slot>
        <x-slot name="description">
            Add a new hairstyle to the system. <br>
            This will be available to all salons, but specific details can be attached to your salon only.
        </x-slot>

        <!-- Form Fields -->
        <x-slot name="form">
            <div class="col-span-12 grid grid-cols-12 gap-4">
            <div class="col-span-6">
                <x-label for="name" value="Hairstyle Name" />
                <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name" />
                <x-input-error for="name" class="mt-2" />
            </div>

            {{-- <div class="col-span-6 sm:col-span-4 mt-4">
                <x-label for="description" value="Description" />
                <textarea id="description" rows="4" class="mt-1 block w-full" wire:model.defer="description"></textarea>
                <x-input-error for="description" class="mt-2" />
            </div> --}}

            <div class="col-span-6">
                <x-label for="price" value="Base Price (UGX)" />
                <x-input id="price" type="number" step="0.01" class="mt-1 block w-full"
                    wire:model.defer="price" />
                <x-input-error for="price" class="mt-2" />
            </div>
            </div>
        </x-slot>

        <!-- Action Buttons -->
        <x-slot name="actions">
            <x-button wire:click="saveHairStyle">Save</x-button>
            <x-secondary-button class="ms-2">Cancel</x-secondary-button>
        </x-slot>
    </x-form-section>
</div>
