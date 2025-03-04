<?php

namespace App\Http\Controllers;

use App\Models\dishes;
use App\Http\Requests\StoredishesRequest;
use App\Http\Requests\UpdatedishesRequest;

class DishesController extends Controller
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
    public function store(StoredishesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(dishes $dishes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatedishesRequest $request, dishes $dishes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(dishes $dishes)
    {
        //
    }
}
