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
        $rows = dish_meals::all();
        $data = [
            'message' => 'ok',
            'data' => $rows
        ];
        return response()->json($data, options: JSON_UNESCAPED_UNICODE);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storedish_mealsRequest $request)
    {
        $rows = dish_meals::where('id', $request['id'])
        ->get();
    if (count($rows)!=0) {
        # már van ilyen email
        $data = [
            'message' => 'This dish_meal alredy exists',
            'data' => [
                'id' => $request['id']
            ]
        ];
    } else {
        # még nincs ilyen email
        $rows = dish_meals::create(attributes: $request->all());
        $data = [
            'message' => 'ok',
            'data' => $rows
        ];
    }
                
    return response()->json($data, options:JSON_UNESCAPED_UNICODE);
    }

    /**
     * Display the specified resource.
     */
    public function show(dish_meals $id)
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

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatedish_mealsRequest $request, $id)
    {
        $row = dish_meals::find($id);
        if ($row) {
            $rows = dish_meals::where('id', $request['id'])
            ->get();
            if (count($rows)!=0) {
                # már van ilyen email
                $data = [
                    'message' => 'This dish_meal alredy exists',
                    'data' => [
                        'id' => $request['id']
                    ]
                ];
            }else{
                //nincs még ilyen email
                $row->update($request->all());
                $data = [
                    'message' => 'ok',
                    'data' => $row
                ];
            }
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(dish_meals $id)
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
