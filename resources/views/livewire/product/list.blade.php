<div class="container mx-auto px-4 py-8">
    <x-product.filters :categories="$categories" :manufacturers="$manufacturers" />

    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-white">Resultados</h3>
        @if($products->isEmpty())
            <p class="text-gray-600 dark:text-gray-400 text-center py-4">Nenhum produto encontrado com os filtros selecionados.</p>
        @else
            <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($products as $product)
                    <li class="py-4 flex justify-between items-center text-gray-900 dark:text-white">
                        <span class="font-medium">{{ $product->name }}</span>
                        <span class="text-blue-600 dark:text-blue-400 font-bold">R$ {{ number_format($product->price, 2, ',', '.') }}</span>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
