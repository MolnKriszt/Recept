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
        $rows = menu_items::all();
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
        $rows = menu_items::where('id', $request['id'])
        ->get();
    if (count($rows)!=0) {
        # már van ilyen email
        $data = [
            'message' => 'This menu_item alredy exists',
            'data' => [
                'id' => $request['id']
            ]
        ];
    } else {
        # még nincs ilyen email
        $rows = menu_items::create(attributes: $request->all());
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
    public function show(menu_items $id)
    {
        $row = menu_items::find($id);

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
        $row = menu_items::find($id);
        if ($row) {
            $rows = menu_items::where('id', $request['id'])
            ->get();
            if (count($rows)!=0) {
                # már van ilyen email
                $data = [
                    'message' => 'This menu_item alredy exists',
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
    public function destroy(menu_items $id)
    {
        
        $row = menu_items::find($id);
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
