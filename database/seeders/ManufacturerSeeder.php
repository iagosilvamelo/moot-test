<?php

namespace Database\Seeders;

use App\Models\Commercial\Manufacturer;
use Illuminate\Database\Seeder;

class ManufacturerSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Manufacturer::factory()->count(10)->create();
    }
}
