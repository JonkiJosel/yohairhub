<div>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Access Control') }}
            </h2>
            <div class="flex items-center">
                @livewire('new-role-creation-modal')
                @livewire('new-permission-modal')

            </div>
        </div>
    </x-slot>
    <div class="py-4">
        <div class="max-w-7xl ">
            <div class="overflow-hidden  sm:rounded-lg">
                {{-- The whole world belongs to you. --}}
                <div class="p-6 m-2">
                    <div class="grid grid-cols-2 gap-2 center justify-between">
                        @livewire('roles-list')
                        @livewire('permissions-list')
                    </div>
            </div>
        </div>
    </div>

</div>
