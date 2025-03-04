<?php

namespace App\Http\Controllers;

use App\Models\daily_menus;
use App\Http\Requests\Storedaily_menusRequest;
use App\Http\Requests\Updatedaily_menusRequest;

class DailyMenusController extends Controller
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
    public function store(Storedaily_menusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(daily_menus $daily_menus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatedaily_menusRequest $request, daily_menus $daily_menus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(daily_menus $daily_menus)
    {
        //
    }
}
