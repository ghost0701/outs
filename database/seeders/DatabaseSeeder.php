<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Merchant;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            BrandSeeder::class,
            GenderSeeder::class,
            MenuSeeder::class,
            AttributeValueSeeder::class,
            UserSeeder::class,
        ]);

        User::factory(10)->create();
        Merchant::factory(20)->create();
        Product::factory(500)->has(Variant::factory()->count(5))->create();
    }
}
