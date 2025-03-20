<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorecomponentsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'nullable|int',
            'quantity' => 'required|int',
            'unit_id' => 'required|int',
            'dish_id' => 'required|int',
            'ingredient_id' => 'required|int',
            'number_of_people' => 'required|int'
        ];
    }
}
