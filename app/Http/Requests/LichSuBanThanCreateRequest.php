<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LichSuBanThanCreateRequest extends FormRequest
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
            'nv_ma' => 'request|unique:lichsubanthan',
            'lsbt_hanhViPhamToi' => 'request',
            'lsbt_thamGiaToChucChinhTri' => 'request',
        ];
    }
}
