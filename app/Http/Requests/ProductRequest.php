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

        $id = $this->segment(3);
        if (isset($id)) {
            $except = ',' . $id . ',id,deleted,0'; //kiểm tra trùng lặp, loại bỏ ID hiện tại & deleted = 0 (Không bao gồm những bản ghi đã bị xóa)
        } else {
            $except = ',1,deleted'; //deleted <> 1 : Không bao gồm những bản ghi đã bị xóa
        }
        $rules = [
            'product_category_id' => 'required',
            'restaurant_id' => 'required',
            'name' => 'required|max:255|unique:products,name,' . $id,
            'ingredients' => 'required|max:255',
            'price' => 'required|numeric',
            'country' => 'required|max:50',
            'description' => 'required',
            'featured' => 'required',
        ];

        //product/create
        if ($this->isMethod('POST')) {
            $rules['image'] = 'required|image';
        }

        return $rules;
    }
}
