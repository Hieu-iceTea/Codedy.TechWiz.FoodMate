<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
        $id = $this->segment(3);
        if (isset($id)) {
            $except = ',' . $id . ',id,deleted,0'; //kiểm tra trùng lặp, loại bỏ ID hiện tại & deleted = 0 (Không bao gồm những bản ghi đã bị xóa)
        } else {
            $except = ',1,deleted'; //deleted <> 1 : Không bao gồm những bản ghi đã bị xóa
        }
        $rules = [
            'user_id' => 'nullable',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone' => 'required|numeric|min:10|unique:orders,phone'.$id,
            'street' => 'required|max:255',
            'city' => 'required|max:255',
            'payment_type' => 'required',
            'total_amount' => 'required',
        ];
        return $rules;
    }
}
