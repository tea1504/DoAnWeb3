<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TuyenDungCreateRequest extends FormRequest
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
            'td_ngay' => 'required',
            'td_ngheTruocDay' => 'required|min:5|max:50',
            'dv_ma' => 'required',
            'td_coQuanTuyen' => 'required|min:5|max:50',
            'cvu_ma' => 'required',
            'td_ngayLam' => 'required',
            'cvu_ma' => 'required',
            'cv_ma' => 'required',
            'td_soTruong' => 'required|min:5|max:50',
        ];
    }
    public function messages()
    {
        return[
            'nv_ma.required' => 'Bạn phải chọn nhân viên',
            'td_ngay.required' => 'Bạn phải nhập ngày',
            'td_ngheTruocDay.required' => 'Bạn phải nhập nghề nghiệp trước đây',
            'td_ngheTruocDay.min' => 'Bạn phải nhập ít nhất 5 ký tự',
            'td_ngheTruocDay.max' => 'Bạn phải nhập <= 50 ký tự',
            'td_ngheTruocDay.required' => 'Bạn phải nhập nghề nghiệp trước đây',
            'dv_ma.required' => 'Bạn phải chọn đơn vị',
            'td_coQuanTuyen.required' => 'Bạn phải nhập cơ quan tuyển dụng',
            'td_coQuanTuyen.min' => 'Bạn phải nhập ít nhất 5 ký tự',
            'td_coQuanTuyen.max' => 'Bạn phải nhập <= 50 ký tự',
            'cvu_ma.required' => 'Bạn phải chọn chức vụ',
            'cv_ma.required' => 'Bạn phải chọn công việc',
            'td_soTruong.required' => 'Bạn phải nhập sở trường',
            'td_soTruong.min' => 'Bạn phải nhập ít nhất 5 ký tự',
            'td_soTruong.max' => 'Bạn phải nhập <= 50 ký tự',
        ];
    }
}
