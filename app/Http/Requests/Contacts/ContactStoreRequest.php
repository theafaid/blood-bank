<?php

namespace App\Http\Requests\Contacts;

use App\Http\Requests\Api\v1\BaseFormRequest;

class ContactStoreRequest extends BaseFormRequest
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
            'email' => 'required|string|max:55|email',
            'phone_number' => 'required|string|max:13',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
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
            'subject' => 'escape|capitalize',
            'message' => 'strip_tags',
        ];
    }
}
