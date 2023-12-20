<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $objects = [
            ['name' => 'Women', 'name_ru' => 'Женщины', 'genders' => [1], 'children' => [
                ['name' => 'Sweaters & Cardigans', 'name_ru' =>'Свитера & Кардиганы', 'categories' => [6, 7], 'genders' => [1]],
                ['name' => 'T-shirts', 'name_ru' => 'Футболки', 'categories' => [2], 'genders' => [1]],
                ['name' => 'Sweatshirts & Hoodies', 'name_ru' => 'Спортивные свитера & Толстовки', 'categories' => [4, 5], 'genders' => [1]],
                ['name' => 'Jeans', 'name_ru' => 'Джинсы', 'categories' => [8], 'genders' => [1]],
                ['name' => 'Pants', 'name_ru' => 'Брюки', 'categories' => [9], 'genders' => [1]],
                ['name' => 'Skirts', 'name_ru' => 'Юбки', 'categories' => [10], 'genders' => [1]],
                ['name' => 'Sneakers', 'name_ru' => 'Кроссовки', 'categories' => [13], 'genders' => [1]],
                ['name' => 'Sandals & Mules', 'name_ru' => 'Сандалии & Мюли', 'categories' => [15, 16], 'genders' => [1]],
                ['name' => 'Boots & Ankle Boots', 'name_ru' => 'Сапоги & Ботильоны', 'categories' => [17, 18], 'genders' => [1]],
            ]],
            ['name' => 'Men', 'name_ru' => 'Мужчина', 'genders' => [2], 'children' => [
                ['name' => 'Shirts', 'name_ru' => 'Рубашки', 'categories' => [1], 'genders' => [2]],
                ['name' => 'T-shirts', 'name_ru' => 'Футболки', 'categories' => [2], 'genders' => [2]],
                ['name' => 'Sweatshirts & Hoodies', 'name_ru' => 'Спортивные свитера & Толстовки', 'categories' => [4, 5], 'genders' => [2]],
                ['name' => 'Sweaters & Cardigans', 'name_ru' => 'Свитера & Кардиганы', 'categories' => [6, 7], 'genders' => [2]],
                ['name' => 'Jeans', 'name_ru' => 'Джинсы', 'categories' => [8], 'genders' => [2]],
                ['name' => 'Pants', 'name_ru' => 'Брюки', 'categories' => [9], 'genders' => [2]],
                ['name' => 'Shorts & Bermudas', 'name_ru' => 'Шорты & Бермуды', 'categories' => [11, 12], 'genders' => [2]],
                ['name' => 'Sneakers', 'name_ru' => 'Кроссовки', 'categories' => [13], 'genders' => [2]],
                ['name' => 'Trainers', 'name_ru' => 'Спортивные кроссовки', 'categories' => [14], 'genders' => [2]],
                ['name' => 'Sandals & Mules', 'name_ru' => 'Сандалии & Мюли', 'categories' => [15, 16], 'genders' => [2]],
                ['name' => 'Boots', 'name_ru' => 'Сапоги', 'categories' => [17], 'genders' => [2]],
            ]],
            ['name' => 'Kids', 'name_ru' => 'Дети', 'genders' => [3], 'children' => [
                ['name' => 'Shirts', 'name_ru' => 'Рубашки', 'categories' => [1], 'genders' => [3]],
                ['name' => 'T-shirts', 'name_ru' => 'Футболки', 'categories' => [2], 'genders' => [3]],
                ['name' => 'Sweatshirts & Hoodies', 'name_ru' => 'Спортивные свитера & Толстовки', 'categories' => [4, 5], 'genders' => [3]],
                ['name' => 'Jeans', 'name_ru' => 'Джинсы', 'categories' => [8], 'genders' => [3]],
                ['name' => 'Pants', 'name_ru' => 'Брюки', 'categories' => [9], 'genders' => [3]],
                ['name' => 'Skirts', 'name_ru' => 'Юбки', 'categories' => [10], 'genders' => [3]],
                ['name' => 'Shorts & Bermudas', 'name_ru' => 'Шорты & Бермуды', 'categories' => [11, 12], 'genders' => [3]],
                ['name' => 'Sneakers', 'name_ru' => 'Кроссовки', 'categories' => [13], 'genders' => [3]],
                ['name' => 'Trainers', 'name_ru' => 'Спортивные кроссовки', 'categories' => [14], 'genders' => [3]],
                ['name' => 'Sandals & Mules', 'name_ru' => 'Сандалии & Мюли', 'categories' => [15, 16], 'genders' => [3]],
                ['name' => 'Boots', 'name_ru' => 'Сапоги', 'categories' => [17], 'genders' => [3]],
                ]]
        ];

        for ($i = 0; $i < count($objects); $i++) {
            $object = $objects[$i];

            $parent = Menu::create([
                'name' => $object['name'],
                'name_ru' => $object['name_ru'],
                'sort_order' => $i + 1,
            ]);
            $parent->genders()->sync($object['genders']);

            for ($j = 0; $j < count($object['children']); $j++) {
                $child = Menu::create([
                    'parent_id' => $parent->id,
                    'name' => $object['children'][$j]['name'],
                    'name_ru' => $object['children'][$j]['name_ru'],
                    'sort_order' => $j + 1,
                ]);
                $child->categories()->sync($object['children'][$j]['categories']);
                $child->genders()->sync($object['children'][$j]['genders']);
            }
        }
    }
}
