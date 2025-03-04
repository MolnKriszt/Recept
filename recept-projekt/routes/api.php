<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//teszt: /api/ útvonalra
Route::get('/', function(){
    return 'API';
});