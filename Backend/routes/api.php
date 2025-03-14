<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthenticateMy;

Route::get('/', function(){
    return 'API';
});


//region users
Route::post('users/login', [UsersController::class, 'login']);
Route::post('users/logout', [UsersController::class, 'logout']);
Route::get('users', [UsersController::class, 'index'])
    ->middleware('auth:sanctum');
Route::get('users/{id}', [UsersController::class, 'show'])
    ->middleware('auth:sanctum');
Route::post('users', [UsersController::class, 'store'])
    ->middleware('auth:sanctum');    
Route::patch('users/{id}', [UsersController::class, 'update'])
    ->middleware('auth:sanctum');    
Route::delete('users/{id}', [UsersController::class, 'destroy'])
    ->middleware('auth:sanctum');
//endregion

//region roles
Route::get('roles', [RolesController::class, 'index'])
    ->middleware('auth:sanctum');
Route::get('roles/{id}', [RolesController::class, 'show'])
    ->middleware('auth:sanctum');
Route::post('roles', [RolesController::class, 'store'])
    ->middleware('auth:sanctum');    
Route::patch('roles/{id}', [RolesController::class, 'update'])
    ->middleware('auth:sanctum');    
Route::delete('roles/{id}', [RolesController::class, 'destroy'])
    ->middleware('auth:sanctum');
//endregion