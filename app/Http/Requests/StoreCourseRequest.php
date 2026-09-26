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
            'name' => 'required|string|regex:/[a-zA-Zا-ی]/|max:100',
            'price' => 'required|numeric',
            'teacher_id' => 'required|exists:users,id',
            'duration' => 'required|numeric|min:10',
            'is_published' => 'required|integer|in:0,1',
            'description' => 'nullable|max:1000',
        ];
    }
    public function messages(): array
{
    return [
        'name.required' => 'وارد کردن نام دوره الزامی است.',
        'name.regex' => 'نام باید دارای حداقل یک حرف باشد',
        'name.max' => 'نام دوره نباید بیشتر از ۱۰۰ کاراکتر باشد.',

        'price.required' => 'وارد کردن قیمت الزامی است.',
        'price.numeric' => 'قیمت باید به صورت عدد وارد شود.',

        'teacher_id.required' => 'انتخاب مدرس الزامی است.',
        'teacher_id.numeric' => 'شناسه مدرس باید عدد باشد.',
        'teacher_id.exists' => 'مدرس انتخاب‌شده معتبر نیست.',

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
