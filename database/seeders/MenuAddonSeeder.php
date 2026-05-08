<?php

namespace Database\Seeders;

use App\Models\Addon;
use App\Models\Menu;
use App\Models\MenuAddon;
use Illuminate\Database\Seeder;

class MenuAddonSeeder extends Seeder
{
    public function run(): void
    {
        $menus = Menu::all();
        $addons = Addon::all();

        foreach ($menus as $menu) {
            foreach ($addons as $addon) {
                MenuAddon::create([
                    'menu_id' => $menu->id,
                    'addon_id' => $addon->id,
                ]);
            }
        }
    }
}

