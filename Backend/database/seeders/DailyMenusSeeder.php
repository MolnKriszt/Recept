<?php

namespace Database\Seeders;

use App\Models\Daily_menus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DailyMenusSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['id' => 1,'user_id' => 1,'days_of_week' => 'h','number_of_people' => 2],
            ['id' => 2,'user_id' => 1,'days_of_week' => 'k','number_of_people' => 2],
            ['id' => 3,'user_id' => 1,'days_of_week' => 'sze','number_of_people' => 2],
            ['id' => 4,'user_id' => 1,'days_of_week' => 'cs','number_of_people' => 2],
            ['id' => 5,'user_id' => 1,'days_of_week' => 'p','number_of_people' => 2],
            ['id' => 6,'user_id' => 1,'days_of_week' => 'szo','number_of_people' => 5],
            ['id' => 7,'user_id' => 1,'days_of_week' => 'v','number_of_people' => 5],
        ];

        if (Daily_menus::count() === 0) {
            Daily_menus::factory()->createMany($data);
        }
    }
}
