<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
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
            'user_id' => 'nullable',
            'customer_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
            'upazila_id' => 'nullable',
            'thana' => 'required|string',
            'payment_method' => 'required',
            'landmark' => 'nullable',
            'shipping_charge' => 'required|numeric',
            'grand_total' => 'required',
            'sub_total' => 'nullable',
            'payable_amount' => 'nullable|numeric',
            'due_amount' => 'nullable|numeric',
            'coupon_code' => 'nullable',
            'discount_amount' => 'nullable',
            'invoice_number' => 'nullable|unique:orders',
            'status' => 'nullable',
        ];
    }
}
