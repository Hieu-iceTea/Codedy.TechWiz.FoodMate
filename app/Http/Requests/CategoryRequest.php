<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        if ($this->is('admin/category/create')) {
            $rules['image'] = 'required|image';
        }
        $id = $this->segment(3);
        if (isset($id)) {
            $except = ',' . $id . ',id,deleted,0'; //kiểm tra trùng lặp, loại bỏ ID hiện tại & deleted = 0 (Không bao gồm những bản ghi đã bị xóa)
        } else {
            $except = ',1,deleted'; //deleted <> 1 : Không bao gồm những bản ghi đã bị xóa
        }
        $rules = [
            'name' => 'required|max:255|unique:product_categories,name'.$id,
        ];
        return $rules;
    }
}
