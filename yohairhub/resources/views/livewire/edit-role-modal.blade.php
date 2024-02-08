<div>
    {{-- Be like water. --}}
    <a href="#" wire:click='openEditRoleModal()' class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>

    <x-dialog-modal wire:model="editRoleModal_isOpen">
        <x-slot name="title">
            Edit

            <span class="text-blue-500">{{ $role->name }}</span>
             Role
        </x-slot>

        <x-slot name="content">
            <div class="w-full mt-4 ">


                <div class="mt-4">
                        @forelse ($allPermissions as $permission)
                        <label class="relative items-center mb-1 cursor-pointer grid grid-cols-2">
                            <input wire:click="togglePermission({{ $permission->id }})" type="checkbox" value="{{ $permission->name }}" class="sr-only peer" {{ $role->permissions->contains($permission) ? 'checked' : '' }}>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:w-5 after:h-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $permission->name }}</span>
                        </label>

                    @empty
                        <p>No permissions found</p>
                    @endforelse

                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-action-message on="RoleUpdated" class="mr-3">
                {{ __('Updated Successfully') }}
            </x-action-message>
            <x-secondary-button wire:click="grantAllPermissions()" wire:loading.attr="disabled">
                {{ __('Grant All') }}
            </x-secondary-button>
            <x-secondary-button wire:click="revokeAllPermissions()" wire:loading.attr="disabled" class="ml-2">
                {{ __('Revoke All') }}
            </x-secondary-button>
            <x-secondary-button wire:click="$toggle('editRoleModal_isOpen')" wire:loading.attr="disabled" class="ml-2">
                {{ __('Cancel') }}
            </x-secondary-button>


        </x-slot>
    </x-dialog-modal>
</div>
