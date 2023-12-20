<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            1 => ['name' => 'Shirts', 'name_ru' => 'Рубашки'],
            2 => ['name' => 'T-shirts', 'name_ru' => 'Футболки
'],
            3 => ['name' => 'Polos', 'name_ru' => 'Поло'],
            4 => ['name' => 'Sweatshirt', 'name_ru' => 'Спортивные свитера
'],
            5 => ['name' => 'Hoodies', 'name_ru' => 'Толстовки'],
            6 => ['name' => 'Sweaters', 'name_ru' => 'Свитера'],
            7 => ['name' => 'Cardigans', 'name_ru' => 'Кардиганы'],
            8 => ['name' => 'Jeans', 'name_ru' => 'Джинсы'],
            9 => ['name' => 'Pants', 'name_ru' => 'Брюки'],
            10 => ['name' => 'Skirts', 'name_ru' => 'Юбки'],
            11 => ['name' => 'Shorts', 'name_ru' => 'Шорты'],
            12 => ['name' => 'Bermudas', 'name_ru' => 'Бермуды'],
            13 => ['name' => 'Sneakers', 'name_ru' => 'Кроссовки'],
            14 => ['name' => 'Trainers', 'name_ru' => 'Спортивные кроссовки
'],
            15 => ['name' => 'Sandals', 'name_ru' => 'Сандалии'],
            16 => ['name' => 'Mules', 'name_ru' => 'Мюли'],
            17 => ['name' => 'Boots', 'name_ru' => 'Сапоги'],
            18 => ['name' => 'Ankle Boots', 'name_ru' => 'Ботильоны'],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'name_ru' => $category['name_ru'],
            ]);
        }
    }
}
