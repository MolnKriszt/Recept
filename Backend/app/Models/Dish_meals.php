<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish_meals extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'dish_id',
        'meal_id'
    ];
}
