<?php

// app/Http/Requests/UpdateProductRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'memory' => 'nullable|string',
            'color' => 'nullable|string',
            'image' => 'nullable|image',
            'description' => 'nullable|string', 
            'status' => 'required|in:0,1', 
        ];
    }

    /**
     * Get custom attribute names for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => __('lang.name'),
            'category_id' => __('lang.category'),
            'brand_id' => __('lang.brand'),
            'price' => __('lang.price'),
            'stock' => __('lang.stock'),
            'memory' => __('lang.memory'),
            'color' => __('lang.color'),
            'image' => __('lang.image'),
            'description' => __('lang.description'),
            'status' => __('lang.status'),
        ];
    }
}
