<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDealershipRequest extends FormRequest
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
            'business_address' => 'required',
            'user_id' => 'nullable',
            'trade_license_number' => 'required|unique:dealer_ships',
            'attachment' => 'nullable',
            'nid_number' => 'nullable|unique:dealer_ships',
            'tin_number' => 'nullable|unique:dealer_ships',
            'trade_license_photo' => 'nullable',
            'bin_number' => 'nullable',
            'tin_photo' => 'nullable',
            'nid_photo' => 'nullable',
            'others' => 'nullable',
            'p_address' => 'nullable',
            'status' => 'nullable',
        ];
    }
}
