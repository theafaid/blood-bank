<?php

namespace App\Http\Requests\Api\v1\Auth;

use App\Http\Requests\Api\v1\BaseFormRequest;

class UserLoginRequest extends BaseFormRequest
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
            'phone_number' => 'required|string|max:13',
            'password' => 'required|string',
        ];
    }
}
