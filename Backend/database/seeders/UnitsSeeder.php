<?php

namespace Database\Seeders;

use App\Models\Units;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitsSeeder extends Seeder
{
    public function run(): void
    {
        $filePath = database_path('csv\units.csv');
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
    
        if (Units::count() === 0) {
            Units::factory()->createMany($data);
        }
    }
}
