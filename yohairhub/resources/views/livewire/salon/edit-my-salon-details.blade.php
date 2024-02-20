<div>
    {{-- Do your work, then step back. --}}
    <x-form-section submit="createSalon">
        <x-slot name="title">
            {{ __('Salon Details') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Provide your salon details.') }}
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-validation-errors class="mb-4" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-label for="salon_name" value="{{ __('Name') }}" />
                <x-input id="salon_name" type="text" class="mt-1 block w-full" wire:model="salon_name" />
                <x-input-error for="salon_name" class="mt-2" />
            </div>
            
            <div class="col-span-6 sm:col-span-4">
                <x-label for="salon_address" value="{{ __('Address') }}" />
                <x-input id="salon_address" type="text" class="mt-1 block w-full" wire:model="salon_address" />
                <x-input-error for="salon_address" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="salon_city" value="{{ __('City') }}" />
                <x-input id="salon_city" type="text" class="mt-1 block w-full" wire:model="salon_city" />
                <x-input-error for="salon_city" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="salon_image" value="{{ __('Image') }}" />
                <x-input id="salon_image" type="file" accept="image/png, image/jpeg" class="mt-1 block w-full" wire:model.defer="salon_image" />
                <x-input-error for="salon_image" class="mt-2" />
            </div>

            @if (!empty($salon_image))
                <div class="col-span-6 sm:col-span-4">
                    <img class="w-full" src="{{ $salon_image->temporaryUrl() }}">
                </div>
            @endif

            <div class="col-span-6 sm:col-span-4">
                <x-label for="salon_description" value="{{ __('Description') }}" />
                <textarea id="salon_description" class="mt-1 block w-full" wire:model="salon_description"></textarea>
                <x-input-error for="salon_description" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="salon_phone" value="{{ __('Phone') }}" />
                <x-input id="salon_phone" type="text" class="mt-1 block w-full" wire:model="salon_phone" />
                <x-input-error for="salon_phone" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="gender_accepted" value="{{ __('Gender Accepted') }}" />
                <div class="flex items-center mt-2">
                    <input id="gender_male" type="radio" class="form-radio h-5 w-5 text-indigo-600" wire:model="gender_accepted" value="Male">
                    <label for="gender_male" class="ml-2">Male</label>
                </div>
                <div class="flex items-center mt-2">
                    <input id="gender_female" type="radio" class="form-radio h-5 w-5 text-indigo-600" wire:model="gender_accepted" value="Female">
                    <label for="gender_female" class="ml-2">Female</label>
                </div>
                <div class="flex items-center mt-2">
                    <input id="gender_unisex" type="radio" class="form-radio h-5 w-5 text-indigo-600" wire:model="gender_accepted" value="Unisex">
                    <label for="gender_unisex" class="ml-2">Unisex</label>
                </div>
                <x-input-error for="gender_accepted" class="mt-2" />
            </div>
            
        </x-slot>


        <x-slot name="actions">
            <x-action-message on="salonCreated" class="mr-3" >Salon Created Successfully! </x-action-message>

            <x-button wire:click="createSalon" wire:loading.attr="disabled">
                {{ __('Create') }}
            </x-button>
        </x-slot>
    </x-form-section>
</div>
