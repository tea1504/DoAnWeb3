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
            'vbcc_tuNgay' => 'required|min:6|max:7',
            'vbcc_denNgay' => 'required|min:6|max:7',
            'vbcc_trinhDo' => 'max:100',
            'vbcc_hinhThuc' => 'max:100',
            'vbcc_tenTruong' => 'required|min:3|max:100',
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
            'vbcc_tuNgay.required' => 'Bạn phải điền từ ngày',
            'vbcc_tuNgay.min' => 'Từ ngày quá ngắn, phải chứa ít nhất 3 ký tự',
            'vbcc_tuNgay.max' => 'Từ ngày quá dài, chỉ chứa nhiều nhất 100 ký tự',
            'vbcc_denNgay.required' => 'Bạn phải điền đến ngày',
            'vbcc_denNgay.min' => 'Đến ngày quá ngắn, phải chứa ít nhất 3 ký tự',
            'vbcc_denNgay.max' => 'Đến ngày quá dài, chỉ chứa nhiều nhất 100 ký tự',
            'vbcc_trinhDo.min' => 'Tên trình độ quá ngắn, phải chứa ít nhất 3 ký tự',
            'vbcc_trinhDo.max' => 'Tên trình độ quá dài, chỉ chứa nhiều nhất 100 ký tự',
            'vbcc_hinhThuc.required' => 'Bạn phải điền tên hình thức',
            'vbcc_hinhThuc.max' => 'Tên hình thức quá dài, chỉ chứa nhiều nhất 100 ký tự',
            'vbcc_tenTruong.required' => 'Bạn phải điền tên trường',
            'vbcc_tenTruong.min' => 'Tên trường quá ngắn, phải chứa ít nhất 3 ký tự',
            'vbcc_tenTruong.max' => 'Tên trường quá dài, chỉ chứa nhiều nhất 100 ký tự',
        ];
    }
}
