<?php

namespace App\Http\Controllers;

use App\Models\dish_meals;
use App\Http\Requests\Storedish_mealsRequest;
use App\Http\Requests\Updatedish_mealsRequest;

class DishMealsController extends Controller
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
    public function store(Storedish_mealsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(dish_meals $dish_meals)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatedish_mealsRequest $request, dish_meals $dish_meals)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(dish_meals $dish_meals)
    {
        //
    }
}
