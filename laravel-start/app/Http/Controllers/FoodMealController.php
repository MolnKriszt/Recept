<?php

namespace App\Http\Controllers;

use App\Models\foodMeal;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorefoodMealRequest;
use App\Http\Requests\UpdatefoodMealRequest;

class FoodMealController extends Controller
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
    public function store(StorefoodMealRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(foodMeal $foodMeal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatefoodMealRequest $request, foodMeal $foodMeal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(foodMeal $foodMeal)
    {
        //
    }
}
