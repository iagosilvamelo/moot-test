<?php

use App\Domain\DataTransferObjects\Commercial\Product\ProductFilterDTO;
use App\Domain\Services\Commercial\Product\SearchProductService;
use App\Models\Commercial\Category;
use App\Models\Commercial\Manufacturer;
use App\Models\Commercial\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    Product::factory()->count(10)->create();
});

test('it search all products', function () {
    $products = (new SearchProductService())->get(
        new ProductFilterDTO(null, null, null)
    );

    expect($products->count())->toBe(10);
});

test('it search products filtered by category', function () {
    $category = Category::factory()->create([
        'name' => '(PEST) Category test 1'
    ]);

    Product::factory()->count(3)->create([
        'category_id' => $category->id
    ]);

    $products = (new SearchProductService())->get(
        new ProductFilterDTO(null, [$category->id], null)
    );

    expect($products->count())->toBe(3);
});

test('it search products filtered by manufacturer', function () {
    $manufacturer = Manufacturer::factory()->create([
        'name' => '(PEST) Manufacturer test 1'
    ]);

    Product::factory()->count(3)->create([
        'manufacturer_id' => $manufacturer->id
    ]);

    $products = (new SearchProductService())->get(
        new ProductFilterDTO(null, null, [$manufacturer->id])
    );

    expect($products->count())->toBe(3);
});

test('it search products filtered by name', function () {
    Product::factory()->count(3)->create([
        'name' => '(PEST) Product test'
    ]);

    $products = (new SearchProductService())->get(
        new ProductFilterDTO('PEST', null, null)
    );

    expect($products->count())->toBe(3);
});
