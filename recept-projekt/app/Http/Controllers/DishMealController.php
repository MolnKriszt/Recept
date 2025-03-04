<?php

namespace App\Http\Controllers;

use App\Models\dish_meal;
use App\Http\Requests\Storedish_mealRequest;
use App\Http\Requests\Updatedish_mealRequest;

class DishMealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storedish_mealRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(dish_meal $dish_meal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatedish_mealRequest $request, dish_meal $dish_meal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(dish_meal $dish_meal)
    {
        //
    }
}
