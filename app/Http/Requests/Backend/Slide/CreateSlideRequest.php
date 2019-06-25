<?php

namespace App\Http\Requests\Backend\Slide;

use Illuminate\Foundation\Http\FormRequest;

class CreateSlideRequest extends FormRequest
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
            'link' => 'required',
            'img' => 'required|mimes:jpg,png,jpeg',
        ];
    }
    public function messages(){
        return [
            'link' => 'Vui lòng nhập link',
            'img.required' => 'Vui lòng chọn ảnh',
            'img.mimes' => 'Sai định dạng ảnh',
        ];
    }
}
