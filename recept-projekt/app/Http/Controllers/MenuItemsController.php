<?php

namespace App\Http\Controllers;

use App\Models\menu_items;
use App\Http\Requests\Storemenu_itemsRequest;
use App\Http\Requests\Updatemenu_itemsRequest;

class MenuItemsController extends Controller
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
    public function store(Storemenu_itemsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(menu_items $menu_items)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatemenu_itemsRequest $request, menu_items $menu_items)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(menu_items $menu_items)
    {
        //
    }
}
