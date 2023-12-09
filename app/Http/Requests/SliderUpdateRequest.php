<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'image' => 'nullable',
            'heading' => 'nullable',
            'url' => 'nullable',
            'numbering' => 'nullable',
            'paragraph' => 'nullable',
            'button_type' => 'nullable',
            'status' => 'nullable',
        ];
    }
}
