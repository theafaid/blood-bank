<?php

namespace App\Http\Requests\Api\v1\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UserRegistrationRequest extends FormRequest
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
            'dob' => 'required|string|date',
            'last_donation_date' => 'required|string|date',
            'phone_number' => 'required|string|max:13',
            'password' => 'required|string|max:255',
            'blood_type_id' => 'required|numeric|exists:blood_types,id',
            'city_id' => 'required|numeric|exists:cities,id',
        ];
    }
}
