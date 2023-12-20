<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            'Avva',
            'Defacto',
            'Koton',
            'Lumberjack',
            'Dagi',
            'Kinetix',
            'Ltb',
            'LC Waikiki',
            'Mavi',
            'Tommy Hilfiger',
            'Jack & Jones',
            'Puma',
            'Adidas',
            'Nike',
            'Gala',
            'Ýeňiş',
            'Röwşen',
            'Mebato',
            'Däp',
        ];

        foreach ($brands as $brand) {
            Brand::create([
                'name' => $brand,
            ]);
        }
    }
}
