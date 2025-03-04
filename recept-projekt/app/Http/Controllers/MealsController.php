<?php

namespace App\Http\Controllers;

use App\Models\meals;
use App\Http\Requests\StoremealsRequest;
use App\Http\Requests\UpdatemealsRequest;

class MealsController extends Controller
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
    public function store(StoremealsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(meals $meals)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatemealsRequest $request, meals $meals)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(meals $meals)
    {
        //
    }
}
