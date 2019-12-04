<?php

namespace App\Http\Requests\Api\v1\Auth;

use App\Http\Requests\Api\v1\BaseFormRequest;

class UserRegistrationRequest extends BaseFormRequest
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
            'name' => 'required|string|max:55',
            'email' => 'required|string|max:55|unique:clients,email',
            'dob' => 'required|string|date_format:Y-m-d',
            'last_donation_date' => 'required|string||date_format:Y-m-d',
            'phone_number' => 'required|string|max:13',
            'password' => 'required|string|max:255',
            'blood_type_id' => 'required|numeric|exists:blood_types,id',
            'city_id' => 'required|numeric|exists:cities,id',
        ];
    }

    /**
     * @return array|void
     */
    public function filters()
    {
        return [
            'name' => 'trim|escape|capitalize',
            'email' => 'trim|escape|lowercase',
                'phone' => 'digit',
        ];
    }
}
