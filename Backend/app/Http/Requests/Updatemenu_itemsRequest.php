<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Updatemenu_itemsRequest extends FormRequest
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
            'daily_menu_id' => 'nullable|int',
            'meal_id' => 'nullable|int',
            'dish_id' => 'nullable|int',
            'is_optional' => 'nullable|int'
        ];
    }
}
