<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div>
        <x-form-section submit="addService">
            <x-slot name="title">
                {{ __('Add Service') }}
            </x-slot>
    
            <x-slot name="description">
                {{ __('Add a new service to the salon.') }}
            </x-slot>
    
            <x-slot name="form">
                <!-- Service Name -->
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="name" value="{{ __('Service Name') }}" />
                    <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name" />
                    <x-input-error for="name" class="mt-2" />
                </div>
    
                <!-- Description -->
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="description" value="{{ __('Description') }}" />
                    <textarea id="description" class="mt-1 block w-full form-textarea" wire:model.defer="description"></textarea>
                    <x-input-error for="description" class="mt-2" />
                </div>
    
                <!-- Price -->
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="price" value="{{ __('Price') }}" />
                    <x-input id="price" type="number" class="mt-1 block w-full" wire:model.defer="price" />
                    <x-input-error for="price" class="mt-2" />
                </div>
            </x-slot>
    
            <x-slot name="actions">
                <x-action-message class="mr-3" on="serviceAdded">
                    {{ __('Service added.') }}
                </x-action-message>
    
                <x-button>
                    {{ __('Add Service') }}
                </x-button>
            </x-slot>
        </x-form-section>
    </div>
    
</div>
