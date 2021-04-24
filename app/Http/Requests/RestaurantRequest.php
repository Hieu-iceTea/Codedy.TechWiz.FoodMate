<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantRequest extends FormRequest
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
        //Áp dụng tất cả, nếu 'create' thì image là bắt buộc.
        if ($this->is('admin/restaurant/create')) {
            $rules = [
                'image' => 'required|image',
            ];
        }

            $rules = [
                'name' => 'required|max:255|unique:restaurants,name',
                'address' => 'required|max:255',
                'description' => 'required',
            ];
    }
}
