<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genders = [
            1 => [
                'name' => 'Women',
                'name_ru' => 'Женщины',
            ],
            2 => [
                'name' => 'Men',
                'name_ru' => 'Мужчины',
            ],
            3 => [
                'name' => 'Kids',
                'name_ru' => 'Дети',
            ],
        ];

        foreach ($genders as $gender) {
            Gender::create([
                'name' => $gender['name'],
                'name_ru' => $gender['name_ru'],
            ]);
        }
    }
}
