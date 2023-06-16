<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Shop;
use App\Models\User;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Shop::factory(1_000)->create()->each(function ($shop) {
            $shop->users()->has(
                User::factory()->create()
            );
        });
    }
}
