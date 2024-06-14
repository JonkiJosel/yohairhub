<div wire:poll>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    @if (auth()->user()->salons->count() > 0)
        <div class="grid lg:grid-cols-3 sm:grid-cols-1 gap-4 justify-stretch p-5 w-full">
            @foreach (auth()->user()->salons as $salon)
                @livewire('salon.my-salon-card', ['salon' => $salon], key('salon-card-' . $salon->id))
            @endforeach
        </div>
    {{-- @elseif (auth()->user()->salons->count() == 1)
        <div
            class="w-ful text-center text-gray-500 dark:text-gray-400 bg-white my-2 p-4 rounded lg:mx-10 text-xl shadow-lg">
            You have one saloon attached to your profile.
        </div> --}}
    @else
        <div
            class="w-ful text-center text-gray-500 dark:text-gray-400 bg-white my-2 p-4 rounded lg:mx-10 text-xl shadow-lg">
            You have no salons attached to your profile.<br>
            learn how to create one
        </div>
    @endif
</div>
