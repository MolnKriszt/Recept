<?php

namespace App\Http\Controllers;

use App\Models\roles;
use App\Http\Requests\StorerolesRequest;
use App\Http\Requests\UpdaterolesRequest;

class RolesController extends Controller
{

    public function index()
    {
        $rows = Roles::all();
        return response()->json(['data' => $rows], options: JSON_UNESCAPED_UNICODE);
    }

    public function store(StorerolesRequest $request)
    {
        try {
            $row = Roles::create($request->all());
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
        $row = Roles::find($id);

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

    public function update(UpdaterolesRequest $request,int $id)
    {
        $row = Roles::find($id);
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
        $row = Roles::find($id);
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
