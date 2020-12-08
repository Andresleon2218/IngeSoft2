<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'document' => ['required', 'integer', 'digits_between:7,13',Rule::unique('users')->ignore(Auth::user())],
            'names' => ['required', 'string', 'min:2', 'max:50'],
            'lastnames' => ['required', 'string', 'min:2', 'max:50'],
            'phone' => ['nullable', 'integer', 'digits:10'],
            'email' => ['required', 'string', 'email', 'max:255',Rule::unique('users')->ignore(Auth::user())]
        ];
    }
}
