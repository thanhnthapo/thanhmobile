<?php

namespace App\Http\Requests\Backend\User;

use Illuminate\Foundation\Http\FormRequest;
use Validator;

class CreateUserRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'address'   => 'required',
            'phone'   => 'required|numeric|unique:users',
            'password'   => 'required|min:6'
        ];
    }
    // Chỉnh thông báo lỗi
    public function messages(){
        return [
            'name.required' => 'Vui lòng nhập tên',
            'name.max' => 'Không được nhập quá 255 ký tự',
            'email.required' => 'Không được bỏ trống',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'address.required' => 'Không được bỏ trống',
            'phone.required' => 'Không được bỏ trống',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'password.required' => 'Không được bỏ trống',
            'password.min' => 'Mật khẩu chứ ít nhất 6 ký tự'
        ];
    }
}
