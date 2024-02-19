<div>
    {{-- Success is as dangerous as failure. --}}
    <x-form-section submit="invite">
        <x-slot name="title">
            {{ __('Invite Hairdresser') }}
        </x-slot>
    
        <x-slot name="description">
            {{ __('Enter the email of the hairdresser you want to invite to your salon.') }}
        </x-slot>
    
        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="email" />
                <x-input-error for="email" class="mt-2" />
            </div>
        </x-slot>
    
        <x-slot name="actions">
            <x-action-message on="success">
                {{ __('Hairdresser invited successfully.') }}
            </x-action-message>
    
            <x-button>
                {{ __('Invite Hairdresser') }}
            </x-button>
        </x-slot>
    </x-form-section>
    
</div>
