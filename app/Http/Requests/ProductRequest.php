<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];


        //user/create
        if ($this->is('admin/product/create')) {
            $rules['image'] = 'required|image';
        }

        $rules = [
            'product_category_id' => 'required',
            'restaurant_id' => 'required',
            'name' => 'required|max:255|unique:products,name',
            'ingredients' => 'required|max:255',
            'price' => 'required|numeric',
            'country' => 'required|max:50',
            'description' => 'required|max:255',
            'featured' => 'required',
        ];

        return $rules;
    }
}
