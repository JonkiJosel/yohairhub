<div>
    {{-- Header with breadcrumb navigation --}}
    <x-slot name="header">
        <div class="flex items-center justify-between p-4 bg-gray-100 dark:bg-gray-800">
            {{-- Breadcrumb Navigation --}}
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="{{ route('dashboard') }}"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M19.707 9.293l-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 9l4-4-4-4" />
                            </svg>
                            <a href="{{ route('all_salons') }}"
                                class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                                All Salons
                            </a>
                        </div>
                    </li>
                </ol>
            </nav>

            {{-- Action Buttons --}}
            <div class="flex items-center space-x-4">
                @livewire('salon.new-salon-modal', key(uniqid()))
            </div>
        </div>
    </x-slot>

    {{-- Main content area --}}
    <div class="p-6 bg-white dark:bg-gray-900 rounded-lg shadow-lg">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Salon
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Owner
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Location
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Hairdressers
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                @forelse ($salons as $salon)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                            {{ $salon->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                            {{ $salon->owner->user->name }}
                            <br>
                            {{ $salon->owner->user->email }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                            {{ $salon->address }}
                            <br>
                            {{ $salon->city }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                            {{ $salon->hairdressers->count() }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            {{-- Featured button --}}
                            @if ($salon->is_featured)
                                <x-secondary-button
                                    wire:click="removeFeatured({{ $salon->id }})"
                                    class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-200">
                                    Featured
                                </x-secondary-button>
                            @else
                                <x-button
                                    wire:click="addFeatured({{ $salon->id }})"
                                    class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400">
                                    Feature
                                </x-button>
                            @endif

                            {{-- Block/Unblock button --}}
                            @if ($salon->trashed())
                                <x-button wire:click="unblockSalon({{ $salon->id }})"
                                    class="ml-2 text-gray-700 dark:text-gray-300 hover:text-green-600 dark:hover:text-green-400">
                                    Unblock
                                </x-button>
                            @else
                                <x-danger-button wire:click="blockSalon({{ $salon->id }})"
                                    class="ml-2 text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-200">
                                    Block
                                </x-danger-button>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500 dark:text-gray-300">
                            No Salons found
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
