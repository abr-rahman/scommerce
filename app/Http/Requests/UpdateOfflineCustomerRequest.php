<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOfflineCustomerRequest extends FormRequest
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
            'email' => 'nullable|email',
            'phone' => 'required',
            'business_name' => 'required',
            'business_address' => 'required',
            'trade_license_number' => 'nullable',
            'bin_number' => 'nullable',
            'tin_number' => 'nullable',
            'nid_number' => 'nullable',
            'p_address' => 'nullable',
            'status' => 'nullable',
        ];
    }
}