<?php

namespace App\Livewire\Product;

use App\Domain\DataTransferObjects\Commercial\Product\ProductFilterDTO;
use App\Models\Commercial\Category;
use App\Models\Commercial\Manufacturer;
use Livewire\Component;
use Livewire\WithPagination;
use App\Domain\Services\Commercial\Product\SearchProductService;

class ProductList extends Component
{
    use WithPagination;

    public $searchName = '';
    public $selectedCategories = [];
    public $selectedManufacturers = [];

    protected $queryString = [
        'searchName' => ['except' => '', 'as' => 'name'],
        'selectedCategories' => ['except' => [], 'as' => 'categories'],
        'selectedManufacturers' => ['except' => [], 'as' => 'manufacturers'],
    ];

    public function updated($property)
    {
        $this->resetPage();
    }

    public function render(SearchProductService $searchService)
    {
        $products = $searchService->get(
            new ProductFilterDTO(
                $this->searchName,
                $this->selectedCategories,
                $this->selectedManufacturers
            )
        );

        $categories = Category::all();
        $manufacturers = Manufacturer::all();

        return view('livewire.product.list', [
            'products' => $products,
            'categories' => $categories,
            'manufacturers' => $manufacturers,
        ]);
    }

    public function clearFilters()
    {
        $this->searchName = '';
        $this->selectedCategories = [];
        $this->selectedManufacturers = [];
        $this->resetPage();
    }
}
