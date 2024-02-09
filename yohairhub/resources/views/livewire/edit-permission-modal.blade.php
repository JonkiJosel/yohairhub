<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <a href="#" wire:click='openEditPermissionModal' class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>

    <x-dialog-modal wire:model="editPermissionModal_isOpen">
        <x-slot name="title">
            Edit <span class="text-blue-500">{{ $permission->name }}</span> Permission
        </x-slot>

        <x-slot name="content">
            <div class="w-full mt-4 ">
                <div class="mt-4">
                    <x-label for="name" value="{{ __('Name') }}" />
                    <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name" />
                    <x-input-error for="name" class="mt-2" />
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-action-message on="PermissionUpdated" class="mr-3">
                {{ __('Updated Successfully') }}
            </x-action-message>
            <x-secondary-button wire:click="updatePermission()" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-secondary-button>
            <x-button class="ml-2" wire:click="closeEditPermissionModal()">
                {{ __('Cancel') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>

</div>

