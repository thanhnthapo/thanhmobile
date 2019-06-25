<?php

namespace App\Http\Requests\Backend\Product;

use Illuminate\Foundation\Http\FormRequest;
use Validator;

class CreateProductRequest extends FormRequest
{
    //   public function __construct(){
    //     Validator::extend('test', function ($attribute, $value, $parameters) {
    //         dd($parameters,$attribute, $value);
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
            'name' => 'required',
            'price' => 'required|',
            'img' => 'required|mimes:jpg,png,jpeg',
            'category_id' => 'required',
            'product_code' => 'required|unique:products',
            'decription' => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Vui lòng nhập tên sản phẩm',
            'price.required' => 'Vui lòng nhập giá sản phẩm',
            'img.required' => 'Vui lòng chọn ảnh sản phẩm',
            'img.mimes' => 'Sai định dạng ảnh',
            'category_id.required' => 'Không được bỏ trống',
            'product_code.required' => 'Không được bỏ trống',
            'product_code.unique' => 'Mã sản phẩm đã tồn tại',
            'decription.required' => 'Không được bỏ trống'
        ];
    }
}
