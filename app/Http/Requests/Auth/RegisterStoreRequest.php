<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterStoreRequest extends FormRequest
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
        if (! $this->isMethod('post'))
            return [];
             
        return [
            "name"      => "required|max:255",
            "username"  => "required|min:3|max:255|unique:users,username",
            "email"     => "required|email|max:255|unique:users,email",
            "password"  => "required|min:7|max:255",
        ];
    }
}
