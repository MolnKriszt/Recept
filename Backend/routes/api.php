<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\IngredientsController;
use App\Http\Controllers\DishesController;
use App\Http\Controllers\ComponentsController;
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

//region categories
Route::get('categories', [CategoriesController::class, 'index']);
Route::get('categories/{id}', [CategoriesController::class, 'show']);
Route::post('categories', [CategoriesController::class, 'store'])
    ->middleware('auth:sanctum');    
Route::patch('categories/{id}', [CategoriesController::class, 'update'])
    ->middleware('auth:sanctum');    
Route::delete('categories/{id}', [CategoriesController::class, 'destroy'])
    ->middleware('auth:sanctum');
//endregion

//region ingredients
Route::get('ingredients', [IngredientsController::class, 'index']);
Route::get('ingredients/{id}', [IngredientsController::class, 'show']);
Route::post('ingredients', [IngredientsController::class, 'store'])
    ->middleware('auth:sanctum');    
Route::patch('ingredients/{id}', [IngredientsController::class, 'update'])
    ->middleware('auth:sanctum');    
Route::delete('ingredients/{id}', [IngredientsController::class, 'destroy'])
    ->middleware('auth:sanctum');
//endregion

//region dishes
Route::get('dishes', [DishesController::class, 'index']);
Route::get('dishes/{id}', [DishesController::class, 'show']);
Route::post('dishes', [DishesController::class, 'store'])
    ->middleware('auth:sanctum');    
Route::patch('dishes/{id}', [DishesController::class, 'update'])
    ->middleware('auth:sanctum');    
Route::delete('dishes/{id}', [DishesController::class, 'destroy'])
    ->middleware('auth:sanctum');
//endregion

//region components
Route::get('components', [ComponentsController::class, 'index']);
Route::get('components/{id}', [ComponentsController::class, 'show']);
Route::post('components', [ComponentsController::class, 'store'])
    ->middleware('auth:sanctum');    
Route::patch('components/{id}', [ComponentsController::class, 'update'])
    ->middleware('auth:sanctum');    
Route::delete('components/{id}', [ComponentsController::class, 'destroy'])
    ->middleware('auth:sanctum');
//endregion