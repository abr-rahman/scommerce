<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'category_id' => 'required|integer',
            'sub_category_id' => 'nullable|integer',
            'brand_id' => 'nullable|integer',
            'product_name' => 'required|string',
            'product_code' => 'nullable|unique:products',
            'added_by' => 'nullable',
            'numbering' => 'nullable|integer',
            'tax_id' => 'nullable|integer',
            'tag' => 'nullable',
            'slug' => 'nullable|unique:products',
            'sku' => 'nullable',
            'short_description' => 'nullable',
            'long_description' => 'nullable',
            'weight' => 'nullable',
            'dimensions' => 'nullable',
            'meterials' => 'nullable',
            'other_info' => 'nullable',
            'warranty_day' => 'nullable',
            'product_image' => 'nullable|max:255',
            'thumbnail_image' => 'nullable|max:512',
            'status' => 'nullable',
            'a_status' => 'nullable',
        ];
    }
}
