<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfessionalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'document' => ['required', 'integer', 'digits_between:7,13','unique:users'],
            'names' => ['required', 'string', 'min:2', 'max:50'],
            'lastnames' => ['required', 'string', 'min:2', 'max:50'],
            'phone' => ['nullable', 'integer', 'digits:10'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'specialties' => ['required', 'array'],
            'specialties.*' => ['numeric'],
        ];
    }
}
