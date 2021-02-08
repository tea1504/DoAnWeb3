<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhenThuongCreateRequest extends FormRequest
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
            'kt_ngayKy' => 'required',
            'kt_nguoiKy' => 'required',
            'kt_lyDo' => 'required|min:3',
        ];
    }
    public function messages()
    {
        return [
            'nv_ma.required' => 'Bạn phải chọn nhân viên',
            'kt_ngayKy.required' => 'Bạn phải chọn ngày ký',
            'kt_nguoiKy.required' => 'Bạn phải chọn người ký',
            'kt_lyDo.required' => 'Bạn phải điền lý do ',
            'kt_lyDo.min' => 'Lý do quá ngắn, phải chứa ít nhất 3 ký tự',
            
        ];
    }
}
