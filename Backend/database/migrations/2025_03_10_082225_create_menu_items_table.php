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
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('daily_menu_id')->constrained('daily_menuses')->onDelete('cascade');
            $table->foreignId('meal_id')->constrained('meals')->onDelete('cascade');
            $table->foreignId('dish_id')->constrained('dishes')->onDelete('cascade');
            $table->boolean('is_optional')->default(false);
            $table->unique(['daily_menu_id', 'meal_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};
