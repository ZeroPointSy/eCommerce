<?php

namespace App\Http\Requests\Api\V1\User\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', Rule::unique('categories','name')],
            'description' => ['nullable','string'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
