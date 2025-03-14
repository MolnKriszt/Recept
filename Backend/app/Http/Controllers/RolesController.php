<?php

namespace App\Http\Controllers;

use App\Models\roles;
use App\Http\Requests\StorerolesRequest;
use App\Http\Requests\UpdaterolesRequest;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = Roles::all();
        $data = [
            'message' => 'ok',
            'data' => $rows
        ];
        return response()->json($data, options: JSON_UNESCAPED_UNICODE);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorerolesRequest $request)
    {
        $rows = Roles::where('name', $request['name'])
            ->get();
        if (count($rows)!=0) {
            # már van ilyen email
            $data = [
                'message' => 'This role alredy exists',
                'data' => [
                    'name' => $request['name']
                ]
            ];
        } else {
            # még nincs ilyen email
            $rows = Roles::create(attributes: $request->all());
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

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdaterolesRequest $request, $id)
    {
        $row = Roles::find($id);
        if ($row) {
            $rows = Roles::where('name', $request['name'])
            ->get();
            if (count($rows)!=0) {
                # már van ilyen email
                $data = [
                    'message' => 'This role alredy exists',
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
