<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
        $productId = $this->route('product');

        return [
            'name' => 'required|string|max:100',
            'sku' => 'required|string|max:150|unique:products,sku,' . $productId,
            'existences' => 'required|integer',
            'properties' => 'required|json',
            'product_type_id' => 'required|exists:product_types,id',
            'product_status_id' => 'nullable|exists:product_statusses,id',
        ];
    }
}
