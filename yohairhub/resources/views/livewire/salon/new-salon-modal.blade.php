<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <x-button wire:click="openNewSalonModal">New Salon</x-button>

    <x-dialog-modal wire:model="newSalonModal_isOpen">
        <x-slot name="title">
            {{ __('Create New Salon') }}  
        </x-slot>

        <x-slot name="content">
            @livewire('salon.new-salon-form', key(uniqid()))
        </x-slot>

        <x-slot name="footer">
            <x-action-message on="salonCreated" class="mr-3" >Salon Created Successfully! </x-action-message>

            <x-button wire:click="closeNewSalonModal" wire:loading.attr="disabled">
                {{ __('Close') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
