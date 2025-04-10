<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Roles extends Model
{
    use HasFactory,HasApiTokens;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'name'
    ];
}
