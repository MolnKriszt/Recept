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
        $data = [
            'message' => 'ok',
            'data' => $rows
        ];
        return response()->json($data, options: JSON_UNESCAPED_UNICODE);
    }

    public function store(StoreunitsRequest $request)
    {
        $rows = Units::where('name', $request['name'])
            ->get();
        if (count($rows)!=0) {

            $data = [
                'message' => 'This unit alredy exists',
                'data' => [
                    'name' => $request['name']
                ]
            ];
        } else {
            $rows = Units::create(attributes: $request->all());
            $data = [
                'message' => 'ok',
                'data' => $rows
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

    public function update(UpdateunitsRequest $request, $id)
    {
        $row = Units::find($id);
        if ($row) {
            $rows = Units::where('name', $request['name'])
            ->get();
            if (count($rows)!=0) {
                $data = [
                    'message' => 'This unit alredy exists',
                    'data' => [
                        'name' => $request['name']
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
