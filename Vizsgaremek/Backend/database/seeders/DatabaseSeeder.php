<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // TÖRLÉSI SORREND (FORDÍTOTT SORREND)
    DB::statement('DELETE FROM dish_meals');
    DB::statement('DELETE FROM menu_items');
    DB::statement('DELETE FROM daily_menuses');
    DB::statement('DELETE FROM components');
    DB::statement('DELETE FROM dishes');
    DB::statement('DELETE FROM ingredients');
    DB::statement('DELETE FROM units');
    DB::statement('DELETE FROM categories');
    DB::statement('DELETE FROM meals');
    DB::statement('DELETE FROM users');
    DB::statement('DELETE FROM roles');

    // AUTO_INCREMENT VISSZAÁLLÍTÁSA (opcionális)
    DB::statement('ALTER TABLE dish_meals AUTO_INCREMENT = 1');
    DB::statement('ALTER TABLE menu_items AUTO_INCREMENT = 1');
    DB::statement('ALTER TABLE daily_menuses AUTO_INCREMENT = 1');
    DB::statement('ALTER TABLE components AUTO_INCREMENT = 1');
    DB::statement('ALTER TABLE dishes AUTO_INCREMENT = 1');
    DB::statement('ALTER TABLE ingredients AUTO_INCREMENT = 1');
    DB::statement('ALTER TABLE units AUTO_INCREMENT = 1');
    DB::statement('ALTER TABLE categories AUTO_INCREMENT = 1');
    DB::statement('ALTER TABLE meals AUTO_INCREMENT = 1');
    DB::statement('ALTER TABLE users AUTO_INCREMENT = 1');
    DB::statement('ALTER TABLE roles AUTO_INCREMENT = 1');

    // SEEDEREK FUTTATÁSA
    $this->call([
        RolesSeeder::class,
        UserSeeder::class,
        MealsSeeder::class,
        CategoriesSeeder::class,
        UnitsSeeder::class,
        IngredientsSeeder::class,
        DishesSeeder::class,
        ComponentsSeeder::class,
        DailyMenusSeeder::class,
        MenuItemsSeeder::class,
        DishMealsSeeder::class,
    ]);
    }
}
