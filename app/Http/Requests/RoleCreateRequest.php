<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleCreateRequest extends FormRequest
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
            'role_ten' => 'required|min:5|max:50',
            'role_mota' => 'required|min:5|max:100',
        ];
    }
    public function messages()
    {
        return[
            'role_ten.required' => 'Bạn phải nhập tên vai trò',
            'role_ten.min' => 'Bạn phải nhập ít nhất 5 ký tự',
            'role_ten.max' => 'Bạn phải nhập <= 50 ký tự',
            'role_mota.required' => 'Bạn phải nhập mô Tả',
            'role_mota.min' => 'Bạn phải nhập ít nhất 5 ký tự',
            'role_mota.max' => 'Bạn phải nhập <= 100 ký tự',
        ];

    }
}
