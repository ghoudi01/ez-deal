<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\Api\APIRequest;

class LoginRequest extends APIRequest
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
            'mobile' =>'required|exists:users,mobile',
            'password' => 'required',
        ];
    }
}
