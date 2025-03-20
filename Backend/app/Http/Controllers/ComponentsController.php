<?php

namespace App\Http\Controllers;

use App\Models\components;
use App\Http\Requests\StorecomponentsRequest;
use App\Http\Requests\UpdatecomponentsRequest;

class ComponentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = components::all();
        $data = [
            'message' => 'ok',
            'data' => $rows
        ];
        return response()->json($data, options: JSON_UNESCAPED_UNICODE);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecomponentsRequest $request)
    {
        $rows = components::where('name', $request['name'])
        ->get();
    if (count($rows)!=0) {
        # már van ilyen email
        $data = [
            'message' => 'This component alredy exists',
            'data' => [
                'name' => $request['name']
            ]
        ];
    } else {
        # még nincs ilyen email
        $rows = components::create(attributes: $request->all());
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
    public function show($id)
    {
        $row = components::find($id);

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
    public function update(UpdatecomponentsRequest $request, $id)
    {
        $row = components::find($id);
        if ($row) {
            $rows = components::where('name', $request['name'])
            ->get();
            if (count($rows)!=0) {
                # már van ilyen email
                $data = [
                    'message' => 'This component alredy exists',
                    'data' => [
                        'name' => $request['name']
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
    public function destroy($id)
    {
        $row = components::find($id);
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
