<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    public function authorize() : bool
    {
        return true;
    }

    public function rules() :array
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:4'
        ];

        return $rules;
    }
}
