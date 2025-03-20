<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatecomponentsRequest extends FormRequest
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
            'quantity' => 'nullable|int',
            'unit_id' => 'nullable|int',
            'dish_id' => 'nullable|int',
            'ingredient_id' => 'nullable|int',
            'number_of_people' => 'nullable|int'

        ];
    }
}
