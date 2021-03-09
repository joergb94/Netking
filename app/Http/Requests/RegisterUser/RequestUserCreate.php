<?php

namespace App\Http\Requests\RegisterUser;

use Illuminate\Foundation\Http\FormRequest;

class RequestUserCreate extends FormRequest
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
            'name' => 'required|max:255|string',
            'email' => 'required|unique:users,email|string|max:255',
            'password' => 'required|confirmed|min:8|string',
        ];
    }
}
