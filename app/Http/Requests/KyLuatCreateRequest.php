<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KyLuatCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'kl_ngayKy' => 'required',
            'kl_nguoiKy' => 'required',
            'kl_lyDo' => 'required|min:3',
        ];
    }
    public function messages()
    {
        return [
            'nv_ma.required' => 'Bạn phải chọn nhân viên',
            'kl_ngayKy.required' => 'Bạn phải chọn ngày ký',
            'kl_nguoiKy.required' => 'Bạn phải chọn người ký',
            'kl_lyDo.required' => 'Bạn phải điền lý do ',
            'kl_lyDo.min' => 'Lý do quá ngắn, phải chứa ít nhất 3 ký tự',
            
        ];
    }
}
