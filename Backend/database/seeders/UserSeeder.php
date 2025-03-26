<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'name' => 'test',
                'email' => 'test@example.com',
                'password' => '123',
                'role_id' => 2,
                'number_of_people' => 1,
            ],
            [
                'id' => 2,
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => '123',
                'role_id' => 1,
                'number_of_people' => 1,
            ]
        ];

        if (User::count() === 0) {
            User::factory()->createMany($data);
        }
    }
}
