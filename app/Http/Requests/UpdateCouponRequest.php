<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCouponRequest extends FormRequest
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
            'name' => 'required',
            'code' => 'required',
            'categories' => 'nullable',
            'valid_from' => 'required',
            'valid_to' => 'required',
            'fixed_amount' => 'nullable',
            'percent_amount' => 'nullable',
            'minimum_order' => 'required',
            'use_limit' => 'required',
            'status' => 'nullable',
        ];
    }
}
