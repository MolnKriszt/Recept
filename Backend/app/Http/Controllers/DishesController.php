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
        $rows = dishes::all();
        $data = [
            'message' => 'ok',
            'data' => $rows
        ];
        return response()->json($data, options: JSON_UNESCAPED_UNICODE);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoredishesRequest $request)
    {
        $rows = dishes::where('name', $request['name'])
            ->get();
        if (count($rows)!=0) {
            # már van ilyen email
            $data = [
                'message' => 'This dish alredy exists',
                'data' => [
                    'name' => $request['name']
                ]
            ];
        } else {
            # még nincs ilyen email
            $rows = dishes::create(attributes: $request->all());
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
        $row = dishes::find($id);

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
    public function update(UpdatedishesRequest $request, $id)
    {
        $row = dishes::find($id);
        if ($row) {
            $rows = dishes::where('name', $request['name'])
            ->get();
            if (count($rows)!=0) {
                # már van ilyen email
                $data = [
                    'message' => 'This dish alredy exists',
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
        $row = dishes::find($id);
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
