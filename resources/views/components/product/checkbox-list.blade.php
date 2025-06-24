<div
    x-data="{ open: false }"
    class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md"
>
    <h3
        class="text-lg font-semibold mb-2 text-gray-900 dark:text-white cursor-pointer select-none flex items-center justify-between"
    @click="open = !open"
    >
        <span>{{ $title }}</span>

        <span class="text-gray-500 dark:text-gray-400">
            <svg x-show="open"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>

            <svg x-show="!open"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </span>
    </h3>

    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-95"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-95"
        class="flex flex-wrap gap-x-2 border-t border-gray-200 dark:border-gray-700 pt-4"
    >
        <div wire:ignore>
            @foreach($items as $item)
                <label class="flex items-center space-x-2 mb-2 cursor-pointer text-gray-700 dark:text-gray-300">
                    <input type="checkbox"
                           wire:model.live="{{ $filter }}"
                           value="{{ $item->id }}"
                           class="form-checkbox h-5 w-5 text-blue-600 rounded focus:ring-blue-500 border-gray-300 dark:bg-gray-700 dark:border-gray-600">
                    <span class="px-2">{{ $item->name }}</span>
                </label>
            @endforeach
        </div>
    </div>
</div>
