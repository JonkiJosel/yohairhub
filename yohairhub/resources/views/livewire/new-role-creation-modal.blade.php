<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <x-button wire:click="openNewRoleCreationModal" class="mr-2">
        {{ __('New Role') }}
    </x-button>

    <x-dialog-modal wire:model="newRoleCreationModal_isOpen">
        <x-slot name="title">
            {{ __('Create New Role') }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" wire:model="name" required autofocus />
                <x-input-error for="name" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-label for="permissions" :value="__('Permissions')" />
                @forelse ($allPermissions as $permission)
                    <div class="flex items-center">
                        <x-input id="{{ $permission->name }}" class="block mt-1 mr-2" type="checkbox" wire:model="permissions" value="{{ $permission->name }}" />
                        <x-label for="{{ $permission->name }}" :value="$permission->name" />
                    </div>
                    
                @empty
                    <p>No permissions found</p>
                @endforelse
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-action-message on="roleCreated" class="mr-3" >Role Created Successfully! </x-action-message>

            <x-button wire:click="closeNewRoleCreationModal" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-button>

            <x-button mode="add" wire:click="createRole" wire:loading.attr="disabled" class="mx-4">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
