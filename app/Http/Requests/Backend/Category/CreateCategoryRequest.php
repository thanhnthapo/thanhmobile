<?php

namespace App\Http\Requests\Backend\Category;

use Illuminate\Foundation\Http\FormRequest;
use Validator;

class CreateCategoryRequest extends FormRequest
{
    // public function __construct(){
    //     Validator::extend('test', function ($attribute, $value, $parameters) {
    //         dd($parameters,$attribute, $value);
    //         if ($value == 'admin') {
    //             return true;
    //         }
    //         else
    //         return false;
    //     }, 'my custom validation rule message');
    // }
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
            'name' => 'required',
            'decription' => 'required',
            'keywords'   => 'required',
        ];
    }
    // Chỉnh thông báo lỗi
    public function messages(){
        return [
            'name.required' => 'Vui lòng nhập tên',
            'decription.required' => 'Không được bỏ trống',
            'keywords.required' => 'Không được bỏ trống',
           
        ];
    }
}
