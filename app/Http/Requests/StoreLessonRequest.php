<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class StoreLessonRequest extends FormRequest
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
            'course_id'=>'required|exists:courses,id',
            'topic'=>'required|string|max:255',
            'description'=>'nullable|string|max:1000',
            'duration'=>'required|numeric|min:1'
        ];
    }
    
   public function messages(): array
{
    return [
        'course_id.required' => 'انتخاب دوره الزامی است.',
        'course_id.exists' => 'دوره انتخاب‌شده معتبر نیست.',

        'topic.required' => 'وارد کردن عنوان درس الزامی است.',
        'topic.string' => 'عنوان درس باید به صورت متن باشد.',
        'topic.max' => 'عنوان درس نباید بیشتر از ۲۵۵ کاراکتر باشد.',

        'description.string' => 'توضیحات باید به صورت متن باشد.',
        'description.max' => 'توضیحات نباید بیشتر از ۱۰۰۰ کاراکتر باشد.',

        'duration.required' => 'وارد کردن مدت درس الزامی است.',
        'duration.numeric' => 'مدت درس باید به صورت عدد وارد شود.',
        'duration.min' => 'مدت درس نمی‌تواند منفی یا صفرباشد.',
    ];
}
}
