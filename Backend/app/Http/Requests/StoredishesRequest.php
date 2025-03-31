<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoredishesRequest extends FormRequest
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
            'id' => 'nulable|int',
            'name' => 'required|string',
            'category_id' => 'required|int',
            'recipe' => 'required|string',
        ];
    }
}
