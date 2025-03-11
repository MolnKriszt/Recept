<?php

namespace Database\Seeders;

use App\Models\Dish_meals;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DishMealsSeeder extends Seeder
{
    public function run(): void
    {
        $filePath = database_path('csv\dish_meals.csv');
        $data = [];
        if (($handle = fopen($filePath, "r")) !== FALSE) {
            while (($row = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $data[] = [
                    'id' => $row[0],
                    'dish_id' => $row[1],
                    'meal_id' => $row[2],
                ];
            }
            fclose($handle);
        }
    
        if (Dish_meals::count() === 0) {
            Dish_meals::factory()->createMany($data);
        }
    }
}
