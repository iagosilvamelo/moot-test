<?php

namespace App\Http\Controllers\Api;

use App\Domain\DataTransferObjects\Commercial\Product\ProductFilterDTO;
use App\Domain\Services\Commercial\Product\SearchProductService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProductSearchRequest;
use \Exception;

class ProductController extends Controller
{
    public function __construct(
        private SearchProductService $searchProductService
    ) {}

    public function index(ProductSearchRequest $request)
    {
        return response()->json([
            'success' => true,
            'data' => $this->searchProductService->get(
                new ProductFilterDTO(
                    name: $request->input('name'),
                    categoryIds: $request->input('categories'),
                    manufacturerIds: $request->input('manufacturers'),
                )
            )
        ]);
    }
}
