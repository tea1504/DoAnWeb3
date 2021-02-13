<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LuongCreateRequest extends FormRequest
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
            'nv_ma' => 'required|unique:luong',
            'ng_ma' => 'required',
            'b_ma' => 'required',
            'pc_ma' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'nv_ma.unique' => 'Nhân viên đã có dữ liệu lương',
        ];
    }
}
