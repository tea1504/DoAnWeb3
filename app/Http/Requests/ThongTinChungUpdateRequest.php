<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThongTinChungUpdateRequest extends FormRequest
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
            'nv_anh' => 'file',
            'nv_hoTen' => 'required|min:3|max:50',
            'nv_tenGoiKhac' => 'nullable|min:3|max:50',
            'nv_trinhDoChuyenMon' => 'nullable|min:3|max:255',
            'nv_ngaySinh' => 'date',
            'dt_ma' => 'required',
            'tg_ma' => 'required',
            'nv_hoKhauThuongTru' => 'required|min:3|max:200',
            'nv_noiOHienNay' => 'required|min:3|max:200',
            'nv_ngayVaoDang' => 'nullable|date',
            'nv_ngayVaoDangChinhThuc' => 'nullable|date',
            'nv_ngayNhapNgu' => 'nullable|date',
            'nv_ngayXuatNgu' => 'nullable|date',
            'nv_quanHam' => 'nullable|min:3|max:100',
            'nv_sucKhoe' => 'nullable|min:3|max:100',
            'nv_chieuCao' => 'required|numeric',
            'nv_canNang' => 'required|numeric',
            'nm_ma' => 'required',
            'nv_hangThuongBinh' => 'nullable|min:3|max:100',
            'nv_giaDinhChinhSach' => 'nullable|min:3|max:100',
            'nv_cmnd' => 'required|digits:12',
            'nv_cmndNgayCap' => 'required|date',
            'nv_bhxh' => 'required|digits:10',
            'td_ma' => 'required',
            'nv_sdt' => 'required|digits:10',
            'nv_email' => 'required|min:3|max:200',
            'role_ma' => 'required',
            'cvu_ma' => 'required',
            'nv_gioiTinh' => 'required',
        ];
    }
}
