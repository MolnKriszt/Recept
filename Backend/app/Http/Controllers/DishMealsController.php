<?php

namespace App\Http\Controllers;

use App\Models\dish_meals;
use App\Http\Requests\Storedish_mealsRequest;
use App\Http\Requests\Updatedish_mealsRequest;

class DishMealsController extends Controller
{

    public function index()
    {
        $rows = dish_meals::all();

        return response()->json(['data' => $rows], options: JSON_UNESCAPED_UNICODE);
    }

    public function store(Storedish_mealsRequest $request)
    {
        try {
            $row = dish_meals::create($request->all());
            $data = [
                'message' => 'ok',
                'data' => $row
            ];
        } catch (\Illuminate\Database\QueryException $e) {
            $data = [
                'message' => 'The post failed',
                'data' => []
            ];
        }
                
        return response()->json($data, options:JSON_UNESCAPED_UNICODE);
    }

    public function show(int $id)
    {
        $row = dish_meals::find($id);

        if ($row) {
            $data = [
                'message' => 'ok',
                'data' => $row
            ];
        } else {
            $data = [
                'message' => 'Not found',
                'data' => [
                    'id' => $id
                ]
            ];
        }

        return response()->json($data, options: JSON_UNESCAPED_UNICODE);
    }

    public function update(Updatedish_mealsRequest $request, int $id)
    {
        $row = dish_meals::find($id);
        if ($row) {
            $row->update($request->all());
            $data = [
                'message' => 'ok',
                'data' => $row
            ];
        } else {
            $data = [
                'message' => 'Not found',
                'data' => [
                    'id' => $id
                ]
            ];
        }

        return response()->json($data, options:JSON_UNESCAPED_UNICODE);
    }

    public function destroy(int $id)
    {
        $row = dish_meals::find($id);
        if ($row) {
            $row->delete();
            $data = [
                'message' => 'ok',
                'data' => [
                    'id' => $id
                ]
            ];
        } else {
            $data = [
                'message' => 'Not found',
                'data' => [
                    'id' => $id
                ]
            ];
        }
        
        return response()->json($data, options: JSON_UNESCAPED_UNICODE);
    }
}
