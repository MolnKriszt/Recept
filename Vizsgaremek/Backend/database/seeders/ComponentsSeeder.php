<?php

namespace Database\Seeders;

use App\Models\Components;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComponentsSeeder extends Seeder
{
    public function run(): void
    {
        $filePath = database_path('csv\components.csv');
        $data = [];
        if (($handle = fopen($filePath, "r")) !== FALSE) {
            while (($row = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $data[] = [
                    'id' => $row[0],
                    'quantity' => strtolower($row[1]) === 'null' || empty($row[1]) ? null : $row[1],
                    'unit_id' => $row[2],
                    'dish_id' => $row[3],
                    'ingredient_id' => $row[4],
                    'number_of_people' => $row[5],
                ];
            }
            fclose($handle);
        }
    
        if (Components::count() === 0) {
            Components::factory()->createMany($data);
        }
    }
}
