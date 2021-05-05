<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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
        $rules = [];

        $password_rule = 'max:64|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/';

        //user/*
        $except = ',1,deleted'; //deleted <> 1 : Không bao gồm những bản ghi đã bị xóa

        $rules = [
            'user_name' => 'required|min:6|max:64|unique:user,user_name' . $except,
            'password' => 'required|' . $password_rule,

            'email' => 'required|email',
            'first_name' => 'required|regex:/^([^0-9]*)$/',
            'last_name' => 'required|regex:/^([^0-9]*)$/',
            'phone' => 'required|numeric',
            'address' => 'required',
        ];

        //account/*
        if ($this->is('account/*')) {


            $id = Auth::id();
            if (isset($id)) {
                $except = ',' . $id . ',id,deleted,0'; //kiểm tra trùng lặp, loại bỏ ID hiện tại & deleted = 0 (Không bao gồm những bản ghi đã bị xóa)
            } else {
                $except = ',1,deleted'; //deleted <> 1 : Không bao gồm những bản ghi đã bị xóa
            }

            $rules = [
                'email' => 'required|min:6|max:64|unique:user,email' . $except,
                'first_name' => 'required|regex:/^([^0-9]*)$/',
                'last_name' => 'required|regex:/^([^0-9]*)$/',
                //'phone' => 'required|numeric',
                'address' => 'required',
            ];

            if ($this->request->get('action') == 'change_password') {
                $rules = [
                    'password' => 'required|' . $password_rule
                ];
            }
        }

        if ($this->is('account/reset-password')) {
            $rules = [
                'password' => 'required|' . $password_rule,
            ];
        }

        //account/*
        if ($this->is('admin/user/*')) {
            $id = Auth::id();
            if (isset($id)) {
                $except = ',' . $id . ',id,deleted,0'; //kiểm tra trùng lặp, loại bỏ ID hiện tại & deleted = 0 (Không bao gồm những bản ghi đã bị xóa)
            } else {
                $except = ',1,deleted'; //deleted <> 1 : Không bao gồm những bản ghi đã bị xóa
            }

            $rules = [
                'email' => 'required|min:6|max:64|unique:user,email' . $except,
                'first_name' => 'required|regex:/^([^0-9]*)$/',
                'last_name' => 'required|regex:/^([^0-9]*)$/',
                //'phone' => 'required|numeric',
                'address' => 'required',
            ];

            //Không bắt buộc phải sửa password, nếu có sửa thì mới validate
            $rules['password'] = 'nullable|' . $password_rule;
        }

        return $rules;
    }

    /**
     * Change the autogenerated stub
     *
     * @return array
     */
    public function messages()
    {
        return [
            'password.regex' => 'The password must contain at least six characters, at least one number and both lower and uppercase letters and special characters',
        ];
    }

}
