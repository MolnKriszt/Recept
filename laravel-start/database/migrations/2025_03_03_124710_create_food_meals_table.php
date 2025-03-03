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
        Schema::create('food_meals', function (Blueprint $table) {
            $table->Integer('id')->autoIncrement();


            $table->Integer('foodId');
            $table->foreign('foodId')->references('id')->on('foods');

            
            $table->Integer('mealId');
            $table->foreign('mealId')->references('id')->on('meals');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_meals');
    }
};
