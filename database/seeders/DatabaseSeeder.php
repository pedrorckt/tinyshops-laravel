<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::disableQueryLog();

        $this->call(CategorySeeder::class);

        $this->call(ShopSeeder::class);

        $this->call(ProductSeeder::class);

        $this->call(ImageSeeder::class);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'shop_id' => 1,
        ]);
        
        
    }
}
