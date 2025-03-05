<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Roles;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id' => 1,'name' => 'admin'],['id' => 2,'name' => 'user']
        ];

        if (Roles::count() === 0) {
            Roles::factory()->createMany($data);
        }
    }
}
