<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
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
            'name' => 'required|alpha|max:100',
            'price' => 'required|numeric',
            'duration' => 'required|numeric|min:10',
            'is_published' => 'required|integer|in:0,1',
            'description' => 'nullable|max:1000',
        ];
    }
    public function messages(): array
{
    return [
        'name.required' => 'وارد کردن نام دوره الزامی است.',
        'name.alpha' => 'نام دوره باید فقط شامل حروف باشد.',
        'name.max' => 'نام دوره نباید بیشتر از ۱۰۰ کاراکتر باشد.',

        'price.required' => 'وارد کردن قیمت الزامی است.',
        'price.numeric' => 'قیمت باید به صورت عدد وارد شود.',


        'duration.required' => 'وارد کردن مدت دوره الزامی است.',
        'duration.numeric' => 'مدت دوره باید عدد باشد.',
        'duration.min' => 'مدت دوره باید حداقل ۱۰ باشد.',

        'is_published.required' => 'تعیین وضعیت انتشار الزامی است.',
        'is_published.integer' => 'وضعیت انتشار باید عدد صحیح باشد.',
        'is_published.in' => 'وضعیت انتشار نامعتبر است.',

        'description.max' => 'توضیحات نباید بیشتر از ۱۰۰۰ کاراکتر باشد.',
    ];
}
}
