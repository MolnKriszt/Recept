<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dishes extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'category_id',
        'recipe'
    ];
}
