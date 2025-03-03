<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menu_meals', function (Blueprint $table) {
            $table->Integer('id')->autoIncrement();
            $table->foreignId('dailyMenuId')->constrained('daily_menu_ids');            
            $table->foreignId('mealId')->constrained('meals');            
            $table->foreignId('foodId')->constrained('foods');            
            $table->Integer('needsIt');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_meals');
    }
};
