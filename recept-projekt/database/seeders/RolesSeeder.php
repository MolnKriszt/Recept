<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id' => 1,'role' => 'admin'],['id' => 2,'role' => 'user']
        ];

        if (Roles::count() === 0) {
            Roles::factory()->createMany($data);
        }
    }
}
