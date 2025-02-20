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
            $table->Integer('quantityunitId')->references('id')->on('quantityunits');
            // $table->Integer('foodId')->references('id')->on('');

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
