<?php

namespace Database\Seeders;

use App\Models\Dishes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DishesSeeder extends Seeder
{
    public function run(): void
    {
        $filePath = database_path('csv\dishes.csv');
        $data = [];
        if (($handle = fopen($filePath, "r")) !== FALSE) {
            while (($row = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $data[] = [
                    'id' => $row[0],
                    'name' => $row[1],
                    'category_id' => $row[2],
                    'recipe' => $row[3],
                ];
            }
            fclose($handle);
        }
    
        if (Dishes::count() === 0) {
            Dishes::factory()->createMany($data);
        }
    }
}
