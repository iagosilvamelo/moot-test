<div class="container mx-auto px-4 py-8">
    <div class="flex flex-row gap-4 mb-6 items-end">
        <div class="flex-1">
            <input type="text"
                   wire:model.live.debounce.300ms="searchName"
                   placeholder="Buscar por nome..."
                   class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400">
        </div>

        <div>
            <button wire:click="clearFilters"
                    class="py-3 px-6 bg-red-600 hover:bg-red-700 text-white font-bold rounded-lg transition duration-300 ease-in-out whitespace-nowrap">
                Limpar Filtros
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <x-product.checkbox-list :title="'Categorias'" :items="$categories" :filter="'selectedCategories'" />
        <x-product.checkbox-list :title="'Marcas'" :items="$manufacturers" :filter="'selectedManufacturers'" />
    </div>
</div>
