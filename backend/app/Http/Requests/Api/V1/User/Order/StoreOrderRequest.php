<?php

namespace App\Http\Requests\Api\V1\User\Order;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required',Rule::exists('users','id')],
            'total_price' => ['required','numeric'],
            'date' => ['required','date']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
