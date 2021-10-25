<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // Change alpha with a regex
            'name' => 'required|string|max:255|regex:/^[a-zA-Z ]*$/',
            'value' => 'required|min:0|numeric'
        ];
    }
}
