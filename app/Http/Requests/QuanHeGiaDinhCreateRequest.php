<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuanHeGiaDinhCreateRequest extends FormRequest
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
            'qhgd_ten' => 'required|min:3|max:100',
            'qhgd_moiQuanHe' => 'required|min:2|max:30',
            'qhgd_namSinh' => 'required|min:4|max:4',
            'qhgd_diaChi' => 'required|min:3|max:100',
            'qhgd_ngheNghiep' => 'required|min:3|max:100',
            'qhgd_nuocNgoai' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'nv_ma.required' => 'Bạn phải chọn nhân viên',
            'qhgd_ten.required' => 'Bạn phải điền tên',
            'qhgd_ten.min' => 'Tên quá ngắn, phải chứa ít nhất 3 ký tự',
            'qhgd_ten.max' => 'Tên quá dày, phải chứa ít hơn 100 ký tự',
            
            'qhgd_moiQuanHe.required' => 'Bạn phải điền mối quan hệ',
            'qhgd_moiQuanHe.min' => 'Mối quan hệ quá ngắn, phải chứa ít nhất 2 ký tự',
            'qhgd_moiQuanHe.max' => 'Mối quan hệ quá dày, phải chứa ít hơn 30 ký tự',
            
            'qhgd_namSinh.required' => 'Bạn phải điền tên',
            'qhgd_namSinh.min' => 'Tên quá ngắn, phải chứa ít nhất 3 ký tự',
            'qhgd_namSinh.max' => 'Tên quá dày, phải chứa ít hơn 100 ký tự',
            
            'qhgd_diaChi.required' => 'Bạn phải điền địa chỉ',
            'qhgd_diaChi.min' => 'Địa chỉ quá ngắn, phải chứa ít nhất 3 ký tự',
            'qhgd_diaChi.max' => 'Địa chỉ quá dày, phải chứa ít hơn 100 ký tự',
            
            'qhgd_ngheNghiep.required' => 'Bạn phải điền nghề nghiệp',
            'qhgd_ngheNghiep.min' => 'Nghề nghiệp quá ngắn, phải chứa ít nhất 3 ký tự',
            'qhgd_ngheNghiep.max' => 'Nghề nghiệp quá dày, phải chứa ít hơn 100 ký tự',
            
            'qhgd_nuocNgoai.required' => 'Bạn phải điền số mối quan hệ nược ngoài',
        ];
    }
}
