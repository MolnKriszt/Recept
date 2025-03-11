<?php

namespace Database\Seeders;

use App\Models\Ingredients;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredientsSeeder extends Seeder
{
    public function run(): void
    {
        $filePath = database_path('csv\ingredients.csv');
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
    
        if (Ingredients::count() === 0) {
            Ingredients::factory()->createMany($data);
        }
    }
}
