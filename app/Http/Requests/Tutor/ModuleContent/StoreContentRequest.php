<?php

namespace App\Http\Requests\Tutor\ModuleContent;

use App\Models\CourseModule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreContentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return CourseModule::where('id', $this->route('moduleId'))->whereHas('course', function ($query) {
            $query->where('tutor_id', tutorId());
        })->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'module_id' => 'required',
            'title' => ['required', 'string', Rule::unique('module_contents')->where('module_id', $this->module_id)],
            'complete_timeframe' => 'required|string',
            'video' => 'nullable|file|mimes:mp4,3gp|max:20480|required_without_all:file,link,transcript',
            'file' => 'nullable|file|mimes:pdf|max:5120|required_without_all:video,link,transcript',
            'link' => 'nullable|url|required_without_all:video,file,transcript',
            'transcript' => 'nullable|string|required_without_all:video,file,link',
        ];
    }


    public function prepareForValidation(): void
    {
        $this->merge([
            'module_id' => $this->route('moduleId'),
        ]);
    }
}
