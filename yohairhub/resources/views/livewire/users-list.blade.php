<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <div class="font-semibold bg-gray-200 flex justify-between py-2 text-xl text-gray-800 leading-tight">
               <x-input wire:model.live.debounce="search" type="text" class="w-full" placeholder="Search..." class="p-3"  />
               <div class="">
                <span>filter By:
                    <select wire:model.live="perPage" class="p-2  rounded-md">
                        <option>5</option>
                        <option>10</option>
                        <option>15</option>
                    </select>
                    <select wire:model.live="filterRole" class="p-2  rounded-md">
                        <option value="">Role</option>
                        @forelse ($allRoles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>

                        @empty
                            <option value="">No roles found</option>
                        @endforelse
                    </select>
                    <select wire:model.live="filterPermission" class="p-2  rounded-md">
                        <option value="">Permission</option>
                        @forelse ($allPermissions as $permission)
                            <option value="{{ $permission->name }}">{{ $permission->name }}</option>

                        @empty
                            <option value="">No permissions found</option>
                        @endforelse

                </span>
               </div>
            </div>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items
                        -center">
                            <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Created at
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Role
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email Verified
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Two Step Auth
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>

            <tbody>
                @forelse ($users as $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-4 p-4">
                            <div class="flex items
                            -center">
                                <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items
                            -center">
                                <div class="flex-shrink-0 w-10 h-10">
                                    <img class="w-10 h-10 rounded-full" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900 dark:text-gray-200">
                                        {{ $user->name }}
                                    </div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">
                                        {{ $user->email }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900 dark:text-gray-200">
                                {{ $user->created_at->diffForHumans() }}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900 dark:text-gray-200">
                                @forelse ( $user->getRoleNames()  as $role)
                                    <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $role }}</span>

                                @empty


                                @endforelse
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900 dark:text-gray-200">
                                @if ($user->email_verified_at)
                                    <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Yes</span>

                                @else
                                    <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">No</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900 dark:text-gray-200">
                                @if ($user->two_factor_secret)
                                    <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Yes</span>
                                @else
                                    <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">No</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items
                            -center">
                                <x-button class="ml-2" wire:click="updateShowModal({{ $user->id }})">
                                    {{ __('View') }}
                                </x-button>
                                <x-button class="ml-2"
    wire:click="deleteUser({{ $user->id }})"
    wire:confirm="Are you sure you want to delete user\n\n{{ $user->name}} \n {{ $user->email}}"
>
    {{ __('Delete') }}
</x-button>

                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="px-6 py-4" colspan="5">
                            <div class="text-sm text-gray-900 dark:text-gray-200">
                                No users found.
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-3">
            {{ $users->links()}}
        </div>


</div>
</div>
