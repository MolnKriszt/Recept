<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyMenus extends Model
{
    /** @use HasFactory<\Database\Factories\DailyMenusFactory> */
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'user_id',
        'days_of_week',
        'number_of_people'
    ];
}
