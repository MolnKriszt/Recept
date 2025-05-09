<?php

namespace Database\Seeders;

use App\Models\Menu_items;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuItemsSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['id' => 1,'daily_menu_id' => 1,'meal_id' => 1,'dish_id' => 1,'is_optional' => 1,],
            ['id' => 2,'daily_menu_id' => 1,'meal_id' => 2,'dish_id' => 1,'is_optional' => 1,],
            ['id' => 3,'daily_menu_id' => 1,'meal_id' => 3,'dish_id' => 1,'is_optional' => 1,],
            ['id' => 4,'daily_menu_id' => 1,'meal_id' => 4,'dish_id' => 1,'is_optional' => 1,],
            ['id' => 5,'daily_menu_id' => 1,'meal_id' => 5,'dish_id' => 1,'is_optional' => 1,],
        ];

        if (Menu_items::count() === 0) {
            Menu_items::factory()->createMany($data);
        }
    }
}
