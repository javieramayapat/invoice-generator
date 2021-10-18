<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class ClientUpdateRequest extends FormRequest
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
            'name'           => 'required|string|max:255|alpha',
            'first_surname'  => 'required|string|max:255|alpha',
            'second_surname' => 'required|string|max:255|alpha',
            'rfc'            => 'required|string|max:13',
            'address'        => 'required|max:255',
            'email'          => 'required|unique:clients,email,'.$this->client->id
        ];
    }
}
