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
        Schema::create('ingredients_quantities', function (Blueprint $table) {
            $table->Integer('id')->autoIncrement();
            $table->double('quantity');

            $table->Integer('quantityunitId');
            $table->foreign('quantityunitId')->references('id')->on('quantityunits');
          
            $table->Integer('foodId');
            $table->foreign('foodId')->references('id')->on('foods');
          
            $table->Integer('ingredientId');
            $table->foreign('ingredientId')->references('id')->on('ingredients');
          
            $table->Integer('howmanypeople');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredients_quantities');
    }
};
