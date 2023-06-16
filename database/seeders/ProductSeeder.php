<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory(10_000)->create()->each(function ($product) {
            $product->categories()->attach([rand(1, 22), rand(1, 22)]);
        });
    }
}
