<?php

namespace App\Http\Controllers;

use App\Models\meals;
use App\Http\Requests\StoremealsRequest;
use App\Http\Requests\UpdatemealsRequest;

class MealsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = Meals::all();

        return response()->json(['data' => $rows], options: JSON_UNESCAPED_UNICODE);
    }

    public function store(StoremealsRequest $request)
    {
        try {
            $row = Meals::create($request->all());
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
        $row = Meals::find($id);

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

    public function update(UpdatemealsRequest $request, int $id)
    {
        $row = Meals::find($id);
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

    public function destroy($id)
    {
        $row = Meals::find($id);
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
