<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThongTinChungCreateRequest extends FormRequest
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
            // 'nv_ma' => 'required|min:6|max:6|unique:nhanvien',
            // 'nv_anh' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048',
            // 'nv_hoTen' => 'required|min:3|max:50',
            // 'nv_tenGoiKhac' => 'required|min:3|max:50',
        ];
    }
}
