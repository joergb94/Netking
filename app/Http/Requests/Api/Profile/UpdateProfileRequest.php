<?php

namespace App\Http\Requests\Api\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            "id"=>"required",
            "name"=>"required",
            "phone"=>"required",
            "street"=>"required",
            'email' => 'required|unique:users,email|string|max:255',
            'nickname' => 'required|unique:users,nickname|string|max:255',
           
        ];
    }
}
