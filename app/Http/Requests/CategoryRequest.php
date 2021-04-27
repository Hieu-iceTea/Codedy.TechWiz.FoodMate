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
        if ($this->isMethod('POST')) {
            $rules['image'] = 'required|image';
        }


        $id = $this->segment(3);
        $rules['name'] = 'required|max:255|unique:product_categories,name,'.$id;

        return $rules;
    }
}
