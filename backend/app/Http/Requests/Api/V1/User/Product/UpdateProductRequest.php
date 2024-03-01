<?php

namespace App\Http\Requests\Api\V1\User\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'category_id' => ['required'],
            'name' => ['required',Rule::exsits('products','name')->ignore($this->route('product'))],
            'description' => ['nullable','string'],
            'price' => ['required', 'numeric'],
            'stock_quantity' => ['required', 'numeric'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
