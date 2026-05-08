<?php

namespace Database\Seeders;

use App\Models\Addon;
use Illuminate\Database\Seeder;

class AddonSeeder extends Seeder
{
    public function run(): void
    {
        $addons = [
            ['name' => 'Extra Cheese', 'price' => 5000, 'type' => 'Toppings', 'is_available' => true],
            ['name' => 'Telur Ceplok', 'price' => 4000, 'type' => 'Extra', 'is_available' => true],
            ['name' => 'Sambal Matah', 'price' => 3000, 'type' => 'Sauce', 'is_available' => true],
            ['name' => 'Extra Nasi', 'price' => 5000, 'type' => 'Extra', 'is_available' => false],
            ['name' => 'Mushroom', 'price' => 6000, 'type' => 'Toppings', 'is_available' => true],
            ['name' => 'Kecap Manis', 'price' => 2000, 'type' => 'Sauce', 'is_available' => true],
            ['name' => 'Extra Ayam', 'price' => 8000, 'type' => 'Extra', 'is_available' => true],
            ['name' => 'Mayonnaise', 'price' => 3000, 'type' => 'Sauce', 'is_available' => false],
            ['name' => 'Extra Sauce', 'price' => 5000, 'type' => 'Sauce', 'is_available' => true],
            ['name' => 'Cheese Topping', 'price' => 7000, 'type' => 'Toppings', 'is_available' => true],
            ['name' => 'Large Portion', 'price' => 12000, 'type' => 'Extra', 'is_available' => true],
        ];

        foreach ($addons as $addon) {
            Addon::create($addon);
        }
    }
}

