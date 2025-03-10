<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Components extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'quantity',
        'unit_id',
        'dish_id',
        'ingredient_id',
        'number_of_people'
    ];
}
