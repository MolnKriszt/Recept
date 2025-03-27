<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storedaily_menusRequest extends FormRequest
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
            'user_id' => 'required|int',
            'days_of_week' => 'required|string',
            'number_of_people' => 'required|int'
        ];
    }
}
