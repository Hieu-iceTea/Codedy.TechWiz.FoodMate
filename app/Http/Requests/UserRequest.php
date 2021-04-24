<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rules=[];
        //user/*
        if ($this->is('admin/user/*')) {
            $except = ',1,deleted'; //deleted <> 1 : Không bao gồm những bản ghi đã bị xóa

            $rules = [
                'user_name' => 'required|min:6|max:64|unique:user,user_name' . $except,
                'password' => 'required|max:64|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/',

                'email' => 'required|email',
                'gender' => 'required|numeric',
                'first_name' => 'required|regex:/^([^0-9]*)$/',
                'last_name' => 'required|regex:/^([^0-9]*)$/',
                'phone' => 'required|numeric',
                'address' => 'required',
            ];
        }
        return $rules;

    }
}
