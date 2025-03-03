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
        Schema::create('daily_menu_ids', function (Blueprint $table) {
            $table->Integer('id')->autoIncrement();
            $table->foreignId('userId')->constrained('users');            
            $table->string('daysOfTheWeek')->notNull();
            $table->Integer('howmanypeopleMenu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_menu_ids');
    }
};
