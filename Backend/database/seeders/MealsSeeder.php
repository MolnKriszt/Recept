<?php

namespace Database\Seeders;

use App\Models\Meals;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MealsSeeder extends Seeder
{
    public function run(): void
    {
        $filePath = database_path('csv\meals.csv');
        $data = [];
        if (($handle = fopen($filePath, "r")) !== FALSE) {
            while (($row = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $data[] = [
                    'id' => $row[0],
                    'name' => $row[1],
                ];
            }
            fclose($handle);
        }
    
        if (Meals::count() === 0) {
            Meals::factory()->createMany($data);
        }
    }
}
