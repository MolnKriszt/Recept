<?php

namespace App\Http\Controllers;

use App\Models\Foods;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFoodsRequest;
use App\Http\Requests\UpdateFoodsRequest;

class FoodsController extends Controller
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
    public function store(StoreFoodsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Foods $foods)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFoodsRequest $request, Foods $foods)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Foods $foods)
    {
        //
    }
}
