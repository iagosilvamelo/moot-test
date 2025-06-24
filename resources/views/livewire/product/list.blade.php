<div class="container mx-auto px-4 py-8">
    <x-product.filters :categories="$categories" :manufacturers="$manufacturers" />

    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-white">Resultados</h3>
        @if($products->isEmpty())
            <p class="text-gray-600 dark:text-gray-400 text-center py-4">Nenhum produto encontrado com os filtros selecionados.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($products as $product)
                    <x-product.card :product="$product" />
                @endforeach
            </div>
        @endif
    </div>
</div>
