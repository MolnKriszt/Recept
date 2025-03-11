<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
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
