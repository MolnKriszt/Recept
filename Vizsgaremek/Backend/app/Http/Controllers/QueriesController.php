<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class QueriesController extends Controller
{

    public function querySelectedDishIngredients($id)
    {
        $query = '
          SELECT c.id,c.quantity,c.unit_id,c.dish_id,c.ingredient_id,u.name AS unitname,d.name AS dishname,i.name AS ingredientname FROM components c
            INNER JOIN dishes d ON d.id = c.dish_id
            INNER JOIN ingredients i on i.id = c.ingredient_id
            INNER JOIN units u on u.id = c.unit_id
            WHERE d.id = ?
        ';

        $rows = DB::select(
            $query,
            [$id]
        );

        $data = [
            'message' => 'ok',
            'data' => $rows
        ];

        return response()->json($data, options: JSON_UNESCAPED_UNICODE);
    }

}