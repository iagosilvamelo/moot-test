<?php

namespace App\Domain\Services\Commercial\Product;

use App\Domain\DataTransferObjects\Commercial\Product\ProductFilterDTO;
use App\Models\Commercial\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class SearchProductService
{
    public function get(ProductFilterDTO $filter): Collection
    {
        $query = Product::query();
        $query = $this->applyFilters($query, $filter);

        return $query->get();
    }

    private function applyFilters(Builder $query, ProductFilterDTO $filter): Builder
    {
        if ($filter->getCategoryIds()) {
            $query->whereIn('category_id', $filter->getCategoryIds());
        }

        if ($filter->getManufacturerIds()) {
            $query->whereIn('manufacturer_id', $filter->getManufacturerIds());
        }

        if ($filter->getName()) {
            $query->where('name', 'like', '%' . $filter->getName() . '%');
        }

        return $query;
    }
}
