<?php

namespace Database\Factories;

use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Gender;
use App\Models\Merchant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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
        $merchant = Merchant::inRandomOrder()->first();
        $category = Category::inRandomOrder()->first();
        $brand = Brand::inRandomOrder()->first();
        $gender = Gender::inRandomOrder()->first();
        $color = AttributeValue::where('attribute_id', 1)->inRandomOrder()->first();
        return [
            'merchant_id' => $merchant->id,
            'category_id' => $category->id,
            'brand_id' => $brand->id,
            'gender_id' => $gender->id,
            'color_id' => $color->id,
            'product_code' => str()->random(20) . '-' . rand(1, 3),
            'group_code' => $category->id . '-' . $brand->id . '-' . $gender->id . '-' . rand(1, 3),
            'name' => fake()->unique()->streetName(),
            'description' => fake()->paragraph(rand(3, 5)),
            'average_rating' => fake()->randomFloat(1,1, 5),
            'ratings_count' => rand(1, 99),
            'favorites_count' => rand(99, 199),
            'random' => rand(1, 999),
        ];
    }
}
