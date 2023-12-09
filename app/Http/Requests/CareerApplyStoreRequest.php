<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CareerApplyStoreRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'deparment' => 'nullable|string',
            'photo' => 'nullable',
            'gender' => 'nullable',
            'age' => 'nullable',
            'skills' => 'nullable',
            'reason_of_join' => 'nullable',
            'choos_reason' => 'nullable',
            'cv' => 'nullable',
            'status' => 'nullable',
        ];
    }
}
