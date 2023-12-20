<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributeValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $objects = [
            ['name' => 'Color', 'name_ru' => 'Цвет', 'values' => [
                'White', 'Black', 'Red', 'Green', 'Blue', 'Brown', 'Grey', 'Orange', 'Pink', 'Purple', 'Yellow',
            ], 'values_ru' => [
                'Белый', 'Черный', 'Красный', 'Зеленый', 'Синий', 'Коричневый', 'Серый', 'Апельсин', 'Розовый', 'Фиолетовый', 'Желтый',
            ]],

            ['name' => 'Size', 'name_ru' => 'Размер', 'values' => [
                'XXS', 'XS', 'S', 'M', 'L', 'XL', '2XL', '3XL', '4XL', '5XL', '6XL',
            ]]
        ];
        for ($i = 0; $i < count($objects); $i++) {
            $object = $objects[$i];

            $attribute = Attribute::create([
                'name' => $object['name'],
                'sort_order' => $i + 1,
            ]);

            for ($i = 0; $i < count($object['values']); $i++) {
                AttributeValue::create([
                    'attribute_id' => $attribute->id,
                    'name' => $object['values'][$i],
                    'sort_order' => $i + 1,
                ]);
            }
        }
    }
}
