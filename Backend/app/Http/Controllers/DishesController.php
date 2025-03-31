<?php

namespace App\Http\Controllers;

use App\Models\dishes;
use App\Http\Requests\StoredishesRequest;
use App\Http\Requests\UpdatedishesRequest;

class DishesController extends Controller
{

    public function index()
    {
        $rows = Dishes::all();

        return response()->json(['data' => $rows], options: JSON_UNESCAPED_UNICODE);
    }

    public function store(StoredishesRequest $request)
    {
        try {
            $row = Dishes::create($request->all());
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
        $row = Dishes::find($id);

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

    public function update(UpdatedishesRequest $request,int $id)
    {
        $row = Dishes::find($id);
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
        $row = Dishes::find($id);
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
