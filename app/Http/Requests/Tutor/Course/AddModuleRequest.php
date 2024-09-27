<?php

namespace App\Http\Requests\Tutor\Course;

use App\Enums\CourseCategoryEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddModuleRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'course_id' => ['required', Rule::exists('courses', 'id')->where('tutor_id', tutorId())],
            'title' => ['required', 'string', Rule::unique('course_modules')->where('course_id', $this->course_id)],
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'course_id' => $this->route('courseId'),
        ]);
    }
}
