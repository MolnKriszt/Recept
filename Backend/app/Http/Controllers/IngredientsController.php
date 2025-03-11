<?php

namespace App\Http\Controllers;

use App\Models\ingredients;
use App\Http\Requests\StoreingredientsRequest;
use App\Http\Requests\UpdateingredientsRequest;

class IngredientsController extends Controller
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
    public function store(StoreingredientsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ingredients $ingredients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateingredientsRequest $request, ingredients $ingredients)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ingredients $ingredients)
    {
        //
    }
}
