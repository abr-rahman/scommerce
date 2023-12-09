<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsUpdateRequest extends FormRequest
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
            'business_name' => 'required',
            'email' => 'nullable',
            'support_email' => 'required',
            'address_one' => 'nullable',
            'address_two' => 'nullable',
            'phone_one' => 'nullable',
            'phone_two' => 'nullable',
            'fb_link' => 'nullable',
            'tw_link' => 'nullable',
            'youtube_link' => 'nullable',
            'linkedin_link' => 'nullable',
            'insta_link' => 'nullable',
            'logo' => 'nullable',
            'status' => 'nullable',
        ];
    }
}
