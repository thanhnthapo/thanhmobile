<?php

namespace App\Http\Requests\Backend\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'name' => 'required|max:255|unique:categories,name,'.$this->category,
            'decription' => 'required',
            'keywords'   => 'required'
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Vui lòng nhập tên',
            'name.unique' => 'Danh mục đã tồn tại',
            'decription.required' => 'Không được bỏ trống',
            'keywords.required' => 'Không được bỏ trống',
        ];
    }
}
