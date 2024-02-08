<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <x-button wire:click="openNewPermisionModal" class="mr-2">
        {{ __('New Permission') }}
    </x-button>

    <x-dialog-modal wire:model="newPermissionModal_isOpen">
        <x-slot name="title">
            {{ __('Create New Permission') }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" wire:model="name" required autofocus />
                <x-input-error for="name" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-action-message on="permissionCreated" class="mr-3" >Permission Created Successfully! </x-action-message>

            <x-button wire:click="closeNewPermissionModal" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-button>

            <x-button mode="add" wire:click="createPermission" wire:loading.attr="disabled" class="mx-4">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
