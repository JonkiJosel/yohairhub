<div>
    {{-- Trigger button to open the modal --}}
    <x-button wire:click="openServiceModal">Edit</x-button>

    {{-- Modal Dialog --}}
    <x-dialog-modal wire:model="showEditServiceModal">
        <x-slot name="title">
            Edit Service
        </x-slot>

        <x-slot name="content">
            <x-form-section submit="">
                <x-slot name="title">
                    Service Details
                </x-slot>

                <x-slot name="description">
                    Update the details of the salon service.
                </x-slot>

                <x-slot name="form">
                    {{-- Service Name --}}
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="name" value="Service Name" />
                        <x-input type="text" class="mt-1 block w-full" wire:model.defer="name" />
                        <x-input-error for="name" class="mt-2" />
                    </div>

                    {{-- Service Description --}}
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="description" value="Description" />
                        <textarea class="mt-1 block w-full" wire:model.defer="description"></textarea>
                        <x-input-error for="description" class="mt-2" />
                    </div>

                    {{-- Service Price --}}
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="price" value="Price ($)" />
                        <x-input type="number" step="0.01" class="mt-1 block w-full" wire:model.defer="price" />
                        <x-input-error for="price" class="mt-2" />
                    </div>
                </x-slot>
            </x-form-section>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="closeModal">Cancel</x-secondary-button>
            <x-button wire:click="updateService" class="ml-3">
                Save
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
