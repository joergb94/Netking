<?php

namespace App\Http\Requests\Api\Cards;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class storeItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return validateAccess(Auth::user(),1);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'card_id'=> "required",
            'card_item_id'=>"required",
            'name' => "nullable|max:100",
            'description' =>"nullable|max:100"
        ];
    }
}
