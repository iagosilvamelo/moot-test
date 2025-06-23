<?php

namespace Database\Seeders;

use App\Models\Commercial\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Product::factory()->count(10)->create();
    }
}
