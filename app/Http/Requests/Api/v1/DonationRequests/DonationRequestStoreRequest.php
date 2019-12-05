<?php

namespace App\Http\Requests\Api\v1\DonationRequests;

use App\Http\Requests\Api\v1\BaseFormRequest;
use App\Rules\ValidLocationCoordinates;

class DonationRequestStoreRequest extends BaseFormRequest
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
            'patient_name' => 'required|string|max:55',
            'patient_age' => 'required|string|min:2|max:2',
            'blood_type_id' => 'required|numeric|exists:blood_types,id',
            'bags_count' => 'required|numeric|max:99',
            'hospital_name' => 'required|string|max:55',
            'location' => ['required', new ValidLocationCoordinates],
            'phone_number' => 'required|string',
            'city_id' => 'required|numeric|exists:cities,id',
            'note' => 'nullable|string|max:5000',
        ];
    }
}
