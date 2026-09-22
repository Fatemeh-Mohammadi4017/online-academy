<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:100',
            'price' => 'required|numeric',
            'teacher_id' => 'required|numeric|exists:users,id',
            'duration' => 'required|numeric|min:10',
            'is_published' => 'required|integer|in:0,1',
            'description' => 'nullable|max:1000',
        ];
    }
}
