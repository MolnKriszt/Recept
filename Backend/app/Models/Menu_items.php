<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu_items extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'daily_menu_id',
        'meal_id',
        'dish_id',
        'is_optional'
    ];
}
