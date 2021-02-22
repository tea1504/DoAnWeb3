<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QueQuanCreateRequest extends FormRequest
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
            'nv_ma' => 'required|unique:quequan',
            't_ma' => 'required',
            'h_ma' => 'required',
            'x_ma' => 'required',
            'qq_diaChi' => 'required|min:3|max:100',
        ];
    }
}