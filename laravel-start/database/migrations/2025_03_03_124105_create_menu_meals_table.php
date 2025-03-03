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
           
            $table->Integer('dailyMenuId');
            $table->foreign('dailyMenuId')->references('id')->on('daily_menu_ids');

            $table->Integer('mealId');
            $table->foreign('mealId')->references('id')->on('meals');
            
            $table->Integer('foodId');
            $table->foreign('foodId')->references('id')->on('foods');

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
