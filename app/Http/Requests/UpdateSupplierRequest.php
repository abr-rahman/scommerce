<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSupplierRequest extends FormRequest
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
            'phone' => 'required',
            'nid_number' => 'required',
            'email' => 'nullable|email',
            'address' => 'required',
            'city' => 'nullable',
            'country' => 'nullable',
            'zip_code' => 'nullable',
            'group' => 'nullable',
            'land_mark' => 'nullable',
            'status' => 'nullable',
        ];
    }
}
