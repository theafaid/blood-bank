<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Api\v1\BaseFormRequest;
use Illuminate\Validation\Rule;

class ResetPasswordRequest extends BaseFormRequest
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
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed',
            'token' => ['required', 'string', Rule::exists('password_resets')->where(function ($query) {
                return $query->where('email', $this->email);
            })]
        ];
    }
}
