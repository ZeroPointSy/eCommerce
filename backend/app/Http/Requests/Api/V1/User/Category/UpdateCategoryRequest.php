<?php

namespace App\Http\Requests\Api\V1\User\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required',Rule::unique('categories','name')->ignore($this->route('category'))],
            'description' => ['nullable','text'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
