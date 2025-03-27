<?php

namespace App\Http\Controllers;

use App\Models\Menu_items;
use App\Http\Requests\Storemenu_itemsRequest;
use App\Http\Requests\Updatemenu_itemsRequest;

class MenuItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = Menu_items::all();
        $data = [
            'message' => 'ok',
            'data' => $rows
        ];
        return response()->json($data, options: JSON_UNESCAPED_UNICODE);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storemenu_itemsRequest $request)
    {
        $rows = Menu_items::where('daily_menu_id', $request['daily_menu_id'])
                    ->where('meal_id', $request['meal_id'])
                    ->where('dish_id', $request['dish_id'])
                    ->get();
    if (count($rows)!=0) {
        # már van ilyen email
        $data = [
            'message' => 'This menu_item alredy exists',
            'data' => [
                'id' =>  $rows['data']['id'],
                'daily_menu_id' => $request['daily_menu_id'],
                'meal_id' => $request['meal_id'],
                'dish_id' => $request['dish_id']
            ]
        ];
    } else {
        # még nincs ilyen email
        $rows = Menu_items::create(attributes: $request->all());
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
    public function show(int $id)
    {
        $row = Menu_items::find($id);

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
    public function update(Updatemenu_itemsRequest $request, $id)
    {
        $row = Menu_items::find($id);
        if ($row) {
            $rows = Menu_items::where('daily_menu_id', $request['daily_menu_id'])
                    ->where('meal_id', $request['meal_id'])
                    ->where('dish_id', $request['dish_id'])
                    ->get();
            if (count($rows)!=0) {
                $data = [
                    'message' => 'This on this day this menu for this meal alredy exists',
                    'data' => [
                        'id' => $request['id']
                    ]
                ];
            }else{
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
    public function destroy(int $id)
    {
        
        $row = Menu_items::find($id);
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
