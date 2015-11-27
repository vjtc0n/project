<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class NganhRequest extends Request
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
            'txtTenNganh' => 'required',
            'txtMaNganh' => 'required',
            'txtDiemChuan' => 'required'
        ];
    }

    public function messages() {
        return [
            'txtTenNganh.required' => 'Vui lòng điền đầy đủ thông tin!',
            'txtMaNganh.required' => 'Vui lòng điền đầy đủ thông tin!',
            'txtDiemChuan.required' => 'Vui lòng điền đầy đủ thông tin!'
        ];
    }
}
