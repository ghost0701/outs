<?php

namespace Database\Factories;

use App\Models\AttributeValue;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Variant>
 */
class VariantFactory extends Factory
{
    public function definition(): array
    {
        $attributeValue = AttributeValue::where('attribute_id', 2)->inRandomOrder()->first();
        return [
            'attribute_value_id' => $attributeValue->id,
            'variant_code' => str()->random(30),
            'discount_price' => rand(1, 99) * 1000 * (1 - rand(0, 1) * 10 / 1000),
            'sell_price' => rand(1, 99) * 1000,
            'stock' => rand(0, 99),
        ];
    }
}
