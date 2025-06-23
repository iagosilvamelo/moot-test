<?php

namespace Database\Factories\Commercial;

use App\Models\Commercial\Category;
use App\Models\Commercial\Manufacturer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commercial\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Category::factory(),
            'manufacturer_id' => Manufacturer::factory(),
            'name' => fake()->name(),
            'price' => fake()->numberBetween(100, 10000),
            'stock' => fake()->numberBetween(0, 100),
        ];
    }
}
