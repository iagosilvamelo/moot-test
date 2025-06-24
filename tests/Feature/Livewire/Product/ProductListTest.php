<?php

use App\Livewire\Product\ProductList;
use App\Models\Commercial\Category;
use App\Models\Commercial\Manufacturer;
use App\Models\Commercial\Product;
use Livewire\Livewire;

beforeEach(function () {
    Category::factory()->count(5)->create();
    Manufacturer::factory()->count(5)->create();

    Product::factory()->count(15)->create();
});

test('a user can view the product list page', function () {
    $this->get('/')
    ->assertSeeLivewire('product.product-list')
    ->assertSee('Buscar por nome...')
    ->assertSee('Categorias')
        ->assertSee('Marcas');
});

test('it displays products initially', function () {
    Livewire::test(ProductList::class)
        ->assertSet('searchName', '')
        ->assertSet('selectedCategories', [])
        ->assertSet('selectedManufacturers', [])
        ->assertSee(Product::first()->name)
        ->assertViewHas('products', function ($products) {
            return $products->count() === 15;
        });
});

test('it searches products by name', function () {
    Product::factory()->create(['name' => 'Caneta Azul']);
    Product::factory()->create(['name' => 'Lápis Vermelho']);

    Livewire::test(ProductList::class)
        ->set('searchName', 'Caneta')
        ->assertSee('Caneta Azul')
        ->assertDontSee('Lápis Vermelho')
        ->assertViewHas('products', function ($products) {
            return $products->count() === 1;
        });
});

test('it filters products by single category', function () {
    $categoryA = Category::factory()->create(['name' => 'Categoria A']);
    $categoryB = Category::factory()->create(['name' => 'Categoria B']);

    Product::factory()->count(3)->create(['category_id' => $categoryA->id]);
    Product::factory()->count(2)->create(['category_id' => $categoryB->id]);

    Livewire::test(ProductList::class)
        ->set('selectedCategories', [$categoryA->id])
        ->assertSee($categoryA->products->first()->name)
        ->assertDontSee($categoryB->products->first()->name)
        ->assertViewHas('products', function ($products) {
            return $products->count() === 3;
        });
});

test('it filters products by multiple categories', function () {
    $categoryA = Category::factory()->create(['name' => 'Categoria A']);
    $categoryB = Category::factory()->create(['name' => 'Categoria B']);
    $categoryC = Category::factory()->create(['name' => 'Categoria C']);

    Product::factory()->count(3)->create(['category_id' => $categoryA->id]);
    Product::factory()->count(2)->create(['category_id' => $categoryB->id]);
    Product::factory()->count(1)->create(['category_id' => $categoryC->id]);

    Livewire::test(ProductList::class)
        ->set('selectedCategories', [$categoryA->id, $categoryB->id])
        ->assertSee($categoryA->products->first()->name)
        ->assertSee($categoryB->products->first()->name)
        ->assertDontSee($categoryC->products->first()->name)
        ->assertViewHas('products', function ($products) {
            return $products->count() === 5;
        });
});

test('it filters products by manufacturer', function () {
    $manufacturerA = Manufacturer::factory()->create(['name' => 'Marca A']);
    $manufacturerB = Manufacturer::factory()->create(['name' => 'Marca B']);

    Product::factory()->count(4)->create(['manufacturer_id' => $manufacturerA->id]);
    Product::factory()->count(1)->create(['manufacturer_id' => $manufacturerB->id]);

    Livewire::test(ProductList::class)
        ->set('selectedManufacturers', [$manufacturerA->id])
        ->assertSee($manufacturerA->products->first()->name)
        ->assertDontSee($manufacturerB->products->first()->name)
        ->assertViewHas('products', function ($products) {
            return $products->count() === 4;
        });
});

test('it filters products by combined criteria (name, categories, manufacturers)', function () {
    $category1 = Category::factory()->create();
    $manufacturer1 = Manufacturer::factory()->create();

    Product::factory()->create([
        'name' => 'Produto Especial X',
        'category_id' => $category1->id,
        'manufacturer_id' => $manufacturer1->id,
    ]);

    Product::factory()->count(2)->create(['name' => 'Produto Normal Y']);
    Product::factory()->create(['name' => 'Produto Z', 'category_id' => Category::factory()->create()->id]);

    Livewire::test(ProductList::class)
        ->set('searchName', 'Especial')
        ->set('selectedCategories', [$category1->id])
        ->set('selectedManufacturers', [$manufacturer1->id])
        ->assertSee('Produto Especial X')
        ->assertDontSee('Produto Normal Y')
        ->assertViewHas('products', function ($products) {
            return $products->count() === 1;
        });
});

test('it clears all filters', function () {
    Livewire::test(ProductList::class)
        ->set('searchName', 'Caneta')
        ->set('selectedCategories', [Category::first()->id])
        ->set('selectedManufacturers', [Manufacturer::first()->id])
        ->call('clearFilters')
        ->assertSet('searchName', '')
        ->assertSet('selectedCategories', [])
        ->assertSet('selectedManufacturers', [])
        ->assertViewHas('products', function ($products) {
            return $products->count() === 15;
        });
});
