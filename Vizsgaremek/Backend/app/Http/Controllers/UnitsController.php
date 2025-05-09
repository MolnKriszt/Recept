<?php

namespace App\Http\Controllers;

use App\Models\units;
use App\Http\Requests\StoreunitsRequest;
use App\Http\Requests\UpdateunitsRequest;

class UnitsController extends Controller
{
    public function index()
    {
        $rows = Units::all();

        return response()->json(['data' => $rows], options: JSON_UNESCAPED_UNICODE);
    }

    public function store(StoreunitsRequest $request)
    {
         try {
            $row = Units::create($request->all());
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
        $row = Units::find($id);

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

    public function update(UpdateunitsRequest $request,int $id)
    {
        $row = Units::find($id);
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
        $row = Units::find($id);
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
