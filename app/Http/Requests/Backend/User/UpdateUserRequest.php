<?php

namespace App\Http\Requests\Backend\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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

        return [
            // 'name' => 'test:thanh,thanh1'
            'name' => 'required|max:255|unique:users,name,'.$this->user,
            'email' => 'required|email|unique:users,email,'.$this->user,
            'address'   => 'required',
            'phone'   => 'required|unique:users,phone,'.$this->user,
            'password'   => 'required|min:6'
        ];

    }
    public function messages(){
        return [
            'name.required' => 'Vui lòng nhập tên',
            'name.unique' => 'Tên người dùng đã tồn tại',
            'name.max' => 'Không được nhập quá 255 ký tự',
            'email.required' => 'Không được bỏ trống',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'phone.required' => 'Không được bỏ trống',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'password.required' => 'Không được bỏ trống',
        ];
    }
}
