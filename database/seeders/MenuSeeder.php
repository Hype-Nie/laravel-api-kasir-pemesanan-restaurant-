<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $foods = Category::where('name', 'Foods')->first()->id;
        $drinks = Category::where('name', 'Drinks')->first()->id;
        $snacks = Category::where('name', 'Snacks')->first()->id;
        $sauce = Category::where('name', 'Sauce')->first()->id;

        $menus = [
            ['category_id' => $foods, 'name' => 'Nasi Goreng', 'price' => 25000, 'is_available' => true, 'description' => 'Nasi goreng spesial dengan telur dan ayam'],
            ['category_id' => $foods, 'name' => 'Mie Ayam', 'price' => 20000, 'is_available' => true, 'description' => 'Mie ayam dengan topping pangsit'],
            ['category_id' => $foods, 'name' => 'Ayam Geprek', 'price' => 22000, 'is_available' => false, 'description' => 'Ayam geprek sambal pedas'],
            ['category_id' => $foods, 'name' => 'Sate Ayam', 'price' => 28000, 'is_available' => true, 'description' => 'Sate ayam 10 tusuk dengan bumbu kacang'],
            ['category_id' => $foods, 'name' => 'Veggie Tomato Mix', 'price' => 19000, 'is_available' => true, 'description' => 'Fresh veggie mix with tomato'],
            ['category_id' => $foods, 'name' => 'Chicken Salad Mix', 'price' => 21000, 'is_available' => true, 'description' => 'Grilled chicken with fresh salad'],
            ['category_id' => $foods, 'name' => 'Avocado Veggie Bowl', 'price' => 28000, 'is_available' => true, 'description' => 'Healthy avocado bowl with veggies'],
            ['category_id' => $drinks, 'name' => 'Es Teh Manis', 'price' => 8000, 'is_available' => true, 'description' => 'Teh manis dingin segar'],
            ['category_id' => $drinks, 'name' => 'Jus Alpukat', 'price' => 15000, 'is_available' => true, 'description' => 'Jus alpukat segar dengan susu'],
            ['category_id' => $drinks, 'name' => 'Berry Smoothie', 'price' => 15000, 'is_available' => true, 'description' => 'Mixed berry smoothie blend'],
            ['category_id' => $drinks, 'name' => 'Lemon Iced Tea', 'price' => 13000, 'is_available' => true, 'description' => 'Refreshing lemon iced tea'],
            ['category_id' => $drinks, 'name' => 'Orange Juice', 'price' => 12000, 'is_available' => true, 'description' => 'Fresh squeezed orange juice'],
            ['category_id' => $snacks, 'name' => 'Kerupuk', 'price' => 5000, 'is_available' => true, 'description' => 'Kerupuk renyah'],
            ['category_id' => $snacks, 'name' => 'Crunchy Chips', 'price' => 11000, 'is_available' => true, 'description' => 'Crispy potato chips'],
            ['category_id' => $snacks, 'name' => 'Pretzel Snack', 'price' => 9000, 'is_available' => true, 'description' => 'Soft baked pretzel'],
            ['category_id' => $snacks, 'name' => 'Choco Cookies', 'price' => 14000, 'is_available' => true, 'description' => 'Homemade chocolate cookies'],
            ['category_id' => $sauce, 'name' => 'Sambal Terasi', 'price' => 3000, 'is_available' => true, 'description' => 'Sambal terasi pedas'],
            ['category_id' => $sauce, 'name' => 'Spicy Fish Sauce', 'price' => 23000, 'is_available' => true, 'description' => 'Spicy fish sauce blend'],
            ['category_id' => $sauce, 'name' => 'Roasted Tomato Sauce', 'price' => 20000, 'is_available' => true, 'description' => 'Slow roasted tomato sauce'],
            ['category_id' => $sauce, 'name' => 'Cheese Dip Sauce', 'price' => 17000, 'is_available' => true, 'description' => 'Creamy cheese dip'],
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}

