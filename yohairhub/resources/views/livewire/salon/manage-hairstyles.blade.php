<div class="p-10">
    {{-- The Master doesn't talk, he acts. --}}
    @include('livewire.partials.single-salon-header')
    {{-- @dd($salon) --}}
    @livewire('salon.new-hairstyle-form', ['salon' => $salon])
    <x-section-border />
    @livewire('salon.new-galery-item-form', ['salon' => $salon])
    <x-section-border />
    @livewire('salon.gallery-preview', ['salon' => $salon])
    
</div>
