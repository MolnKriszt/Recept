<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meals extends Model
{
    /** @use HasFactory<\Database\Factories\MealsFactory> */
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'name'
    ];
}
