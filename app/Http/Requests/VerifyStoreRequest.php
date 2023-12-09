<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerifyStoreRequest extends FormRequest
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
            'address' => 'required|email',
            'product_id' => 'required',
            'barcode_number' => 'required|unique:product_verifies',
            'shope_name' => 'required',
            'invoice_attachment' => 'required',
            'district' => 'nullable',
            'status' => 'nullable',
        ];
    }
}
