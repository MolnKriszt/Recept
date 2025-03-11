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
        Schema::create('dish_meals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dish_id')->constrained('dishes')->onDelete('cascade');
            $table->foreignId('meal_id')->constrained('meals')->onDelete('cascade');
            $table->unique(['dish_id', 'meal_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dish_meals');
    }
};
