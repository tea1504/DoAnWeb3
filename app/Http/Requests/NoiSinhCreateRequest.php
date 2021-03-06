<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoiSinhCreateRequest extends FormRequest
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
            'nv_ma' => 'required|unique:noisinh',
            't_ma' => 'required',
            'h_ma' => 'required',
            'x_ma' => 'required',
            'ns_diaChi' => 'required|min:3|max:100',
        ];
    }
}