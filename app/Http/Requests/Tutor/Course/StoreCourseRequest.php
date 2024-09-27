<?php

namespace App\Http\Requests\Tutor\Course;

use App\Enums\CourseCategoryEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'tagline' => 'required|string',
            'category' => [
                'required',
                'string',
                Rule::in(CourseCategoryEnum::toArray()),
            ],
            'image' => 'required|file|mimes:png,jpg',
            'cover_image' => 'required|file|mimes:png,jpg',
            'description' => 'required|string',
        ];
    }
}
