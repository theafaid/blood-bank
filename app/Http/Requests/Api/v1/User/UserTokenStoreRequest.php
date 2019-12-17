<?php

namespace App\Http\Requests\Api\v1\User;

use App\Http\Requests\Api\v1\BaseFormRequest;
use Illuminate\Validation\Rule;

class UserTokenStoreRequest extends BaseFormRequest
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
            'client_id' => 'required|numeric|exists:clients,id',
            'token' => 'required|string',
        ];
    }
}
