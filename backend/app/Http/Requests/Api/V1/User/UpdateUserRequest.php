<?php

namespace App\Http\Requests\Api\V1\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'full_name' => ['nullable'],
            'phone_number' => ['nullable'],
            'email' => ['nullable',Rule::unique('users','email')],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
