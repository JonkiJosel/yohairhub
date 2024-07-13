<div class="p-6 bg-white rounded-lg shadow">
    <div class="flex justify-between items-center mb-6">
        <div class="w-1/3">
            <label for="startDate" class="block text-sm font-medium text-gray-700">Start Date</label>
            <input type="date" id="startDate" wire:model="startDate" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
        <div class="text-center w-1/3 text-lg font-semibold">
            Salons Created Per Month
        </div>
        <div class="w-1/3">
            <label for="endDate" class="block text-sm font-medium text-gray-700">End Date</label>
            <input type="date" id="endDate" wire:model="endDate" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
    </div>

    <div class="h-[80vh]">
        <livewire:livewire-column-chart :column-chart-model="$chart" />
    </div>
</div>
