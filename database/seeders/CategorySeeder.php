<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Foods', 'description' => 'Main dishes and meals'],
            ['name' => 'Drinks', 'description' => 'Beverages and refreshments'],
            ['name' => 'Snacks', 'description' => 'Light bites and appetizers'],
            ['name' => 'Sauce', 'description' => 'Dipping sauces and condiments'],
            ['name' => 'Desserts', 'description' => 'Sweet treats and desserts'],
            ['name' => 'Seafood', 'description' => 'Fresh seafood dishes'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

