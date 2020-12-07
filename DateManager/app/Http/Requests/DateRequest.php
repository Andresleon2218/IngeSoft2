<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DateRequest extends FormRequest
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
            'date' => 'required|date|after_or_equal:today',
            'start' => 'required|date_format:H:i',
            'end' => 'required|date_format:H:i|after:start',
            'professional_id' => 'required|integer',
            'description' => 'nullable|string'
        ];
    }
}
