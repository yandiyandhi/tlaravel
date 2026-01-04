<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditProductRequest extends FormRequest
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
            'product_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('products', 'product_name')
                    ->ignore($this->route('product')->id)
                    ->whereNull('deleted_at'),
            ],
            'category_id' => ['required', 'exists:categories,id'],
            'amount' => ['required', 'numeric', 'min:0'],
            'qty' => ['required', 'max:15', 'min:0']
        ];
    }

    public function messages(): array
    {
        return [
            'product_name.required' => 'Nama produk wajib diisi',
            'category_id.required'  => 'Kategori wajib dipilih',
            'category_id.exists'    => 'Kategori tidak valid',
            'amount.required'       => 'Jumlah harga wajib diisi',
            'amount.numeric'        => 'Jumlah harus angka',
            'qty.required'          => 'Qty wajib diisi',
            'qty.integer'           => 'Qty harus angka bulat',
        ];
    }
}
