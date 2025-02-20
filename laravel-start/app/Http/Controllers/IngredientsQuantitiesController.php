<?php

namespace App\Http\Controllers;

use App\Models\IngredientsQuantities;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIngredientsQuantitiesRequest;
use App\Http\Requests\UpdateIngredientsQuantitiesRequest;

class IngredientsQuantitiesController extends Controller
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
    public function store(StoreIngredientsQuantitiesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(IngredientsQuantities $ingredientsQuantities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIngredientsQuantitiesRequest $request, IngredientsQuantities $ingredientsQuantities)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IngredientsQuantities $ingredientsQuantities)
    {
        //
    }
}
