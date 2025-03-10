<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $filePath = database_path('csv\categories.csv');
        $data = [];
        if (($handle = fopen($filePath, "r")) !== FALSE) {
            while (($row = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $data[] = [
                    'id' => $row[0],
                    'name' => $row[1],
                    'meal_id' => $row[2],
                ];
            }
            fclose($handle);
        }
    
        if (Categories::count() === 0) {
            Categories::factory()->createMany($data);
        }
    }
}
