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
        $rows = daily_menus::all();
        $data = [
            'message' => 'ok',
            'data' => $rows
        ];
        return response()->json($data, options: JSON_UNESCAPED_UNICODE);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storedaily_menusRequest $request)
    {
        $rows = daily_menus::where('id', $request['id'])
        ->get();
    if (count($rows)!=0) {
        # már van ilyen email
        $data = [
            'message' => 'This daily_menu alredy exists',
            'data' => [
                'id' => $request['id']
            ]
        ];
    } else {
        # még nincs ilyen email
        $rows = daily_menus::create(attributes: $request->all());
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
    public function show(daily_menus $id)
    {
        $row = daily_menus::find($id);

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
    public function update(Updatedaily_menusRequest $request, $id)
    {
        $row = daily_menus::find($id);
        if ($row) {
            $rows = daily_menus::where('id', $request['id'])
            ->get();
            if (count($rows)!=0) {
                # már van ilyen email
                $data = [
                    'message' => 'This daily_menu alredy exists',
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
    public function destroy(daily_menus $id)
    {
        $row = daily_menus::find($id);
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
// 