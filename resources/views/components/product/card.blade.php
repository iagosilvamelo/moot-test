<div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105 duration-300">
    @if($product->image_url)
        <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
    @else
        <div class="w-full h-48 bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
            <span class="text-3xl font-bold text-gray-700 dark:text-gray-300">
                {{ $product->initials }}
            </span>
        </div>
    @endif

    <div class="p-4">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2 line-clamp-2" title="{{ $product->name }}">
            {{ $product->name }}
        </h3>
        <p class="text-gray-600 dark:text-gray-400 text-sm mb-1">
            Categoria: <span class="font-medium">{{ $product->category->name ?? 'N/A' }}</span>
        </p>
        <p class="text-gray-600 dark:text-gray-400 text-sm mb-3">
            Marca: <span class="font-medium">{{ $product->manufacturer->name ?? 'N/A' }}</span>
        </p>
        <div class="flex justify-between items-center">
            <span class="text-2xl font-bold text-blue-600 dark:text-blue-400">
                {{ $product->formattedPrice }}
            </span>
        </div>
    </div>
</div>
