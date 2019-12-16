<?php

namespace App\Http\Requests\Api\v1\User;

use App\Http\Requests\Api\v1\BaseFormRequest;

class UserNotificationSettingUpdateRequest extends BaseFormRequest
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
            'blood_types' => 'present|array|required_with:governorates',
            'blood_types.*' => 'numeric|exists:blood_types,id',
            'governorates' => 'present|array|required_with:blood_types',
            'governorates.*' => 'numeric|exists:governorates,id',
        ];
    }
}
