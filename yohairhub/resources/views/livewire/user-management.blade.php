<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users') }}
            </h2>
            <div class="flex items-center">

                <x-button class="ml-2" wire:click="createShowModal">
                    {{ __('Create') }}
                </x-button>
            </div>
        </div>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl ">
            <div class="overflow-hidden ">
                <div class="p-6 ">
                    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
                    {{-- table for users--}}
                    @livewire('users-list')
            </div>
        </div>
    </div>
</div>
