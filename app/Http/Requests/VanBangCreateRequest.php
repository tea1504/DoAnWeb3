<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VanBangCreateRequest extends FormRequest
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
            'nv_ma' => 'required',
            'vbcc_ten' => 'required|min:3|max:100',
            'lvbcc_ma' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'nv_ma.required' => 'Bạn phải chọn nhân viên',
            'vbcc_ten.required' => 'Bạn phải điền tên văn bằng',
            'vbcc_ten.min' => 'Tên văn bằng quá ngắn, phải chứa ít nhất 3 ký tự',
            'vbcc_ten.max' => 'Tên văn bằng quá dài, chỉ chứa nhiều nhất 100 ký tự',
            'lvbcc_ma.required' => 'Bạn phải chọn loại văn bằng',
        ];
    }
}
