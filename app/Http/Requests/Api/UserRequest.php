<?php

namespace App\Http\Requests\Api;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'     => 'required|between:6,24|regex:/^[A-Za-z0-9\-\_]+$/|unique:users',
            'email'    => 'required|email|unique:users',
            'phone'    => 'required|string|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ];
    }
}
