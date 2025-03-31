<?php

namespace App\Http\Controllers;

use App\Models\daily_menus;
use App\Http\Requests\Storedaily_menusRequest;
use App\Http\Requests\Updatedaily_menusRequest;

class DailyMenusController extends Controller
{

    public function index()
    {
        $rows = daily_menus::all();
        return response()->json(['data' => $rows], options: JSON_UNESCAPED_UNICODE);
    }

    public function store(Storedaily_menusRequest $request)
    {
        try {
            $row = daily_menus::create($request->all());
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

        return response()->json($data, options: JSON_UNESCAPED_UNICODE);
    }

    public function show(int $id)
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

    public function update(Updatedaily_menusRequest $request,int $id)
    {
        $row = daily_menus::find($id);
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
        return response()->json($data, options: JSON_UNESCAPED_UNICODE);
    }

    public function destroy(int $id)
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