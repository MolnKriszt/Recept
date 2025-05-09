<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storemenu_itemsRequest extends FormRequest
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
            'daily_menu_id' => 'required|int',
            'meal_id' => 'required|int',
            'dish_id' => 'required|int',
            'is_optional' => 'nullable|boolean'
        ];
    }
}
