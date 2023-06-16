<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Automotive',
            'Baby',
            'Beauty',
            'Books',
            'Clothing',
            'Computers',
            'Electronics',
            'Games',
            'Garden',
            'Grocery',
            'Health',
            'Home',
            'Industrial',
            'Jewelery',
            'Kids',
            'Movies',
            'Music',
            'Outdoors',
            'Shoes',
            'Sports',
            'Tools',
            'Toys',
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
            ]);
        }
    }
}
