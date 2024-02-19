<div>
    {{-- Stop trying to control. --}}
    @livewire('salon.invite-hairdresser', ['salonId' => $salon->id], key('invite-hairdresser-' . $salon->id))
</div>
