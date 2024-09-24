<?php

namespace App\Http\Requests\Tutor\Profile;

use App\Enums\UserRoleEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
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
            'occupation' => 'required|min:3',
            'image' => [
                Rule::requiredIf(!auth()->user()->tutor),
                'file',
                'mimes:png,jpg'
            ],
            'bio' => 'required|min:6',
        ];
    }
}
