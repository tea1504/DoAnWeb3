<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuaTrinhCongTacRequest extends FormRequest
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
            'qtct_tuNgay' => 'required|min:6|max:7',
            'qtct_denNgay' => 'required|min:6|max:7',
            'cvu_ma' => 'required',
            'dv_ma' => 'required',
            'ng_ma' => 'required',
            'b_ma' => 'required',
        ];
    }
}
