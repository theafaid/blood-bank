<?php

namespace App\Http\Requests\Api\v1\User;

use App\Http\Requests\Api\v1\BaseFormRequest;
use Illuminate\Validation\Rule;

class UserProfileUpdateRequest extends BaseFormRequest
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
            'email' => [
                'required', 'string', 'max:55', 'email',
                Rule::unique('clients')->where(function ($query) {
                    return $query->where('email', $this->email);
                })->ignore($this->user()->id)
            ],
            'dob' => 'required|string|date_format:Y-m-d',
            'last_donation_date' => 'required|string||date_format:Y-m-d',
            'phone_number' => 'required|string|max:13',
            'password' => 'nullable|string|max:255|confirmed',
            'blood_type_id' => 'required|numeric|exists:blood_types,id',
            'city_id' => 'required|numeric|exists:cities,id',
        ];
    }
}
