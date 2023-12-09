<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OutletsStoreRequest extends FormRequest
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
            'org_name' => 'required',
            'phone' => 'required',
            'email' => 'nullable',
            'address' => 'nullable',
            'location' => 'nullable',
            'district_id' => 'nullable',
            'upazila_id' => 'nullable',
            'social_link' => 'nullable',
            'status' => 'nullable',
        ];
    }
}
