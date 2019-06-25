<?php

namespace App\Http\Requests\Backend\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'required|unique:products,name,'.$this->product,
            'price' => 'required|',
            'img' => 'required|mimes:jpg,png,jpeg',
            'category_id' => 'required',
            'product_code' => 'required|unique:products,product_code,'.$this->product,
            'decription' => 'required',
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Vui lòng nhập',
            'name.unique' => 'Sản phẩm đã tồn tại',
            'price.required' => 'Không được bỏ trống',
            'img.required' => 'Không được bỏ trống',
            'category_id.required' => 'Không được bỏ trống',
            'decription.required' => 'Không được bỏ trống',
            'product_code.required' => 'Không được bỏ trống',
            'product_code.unique' => 'Mã sản phẩm đã tồn tại',
        ];
    }
}
