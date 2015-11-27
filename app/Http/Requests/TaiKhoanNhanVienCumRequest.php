<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TaiKhoanNhanVienCumRequest extends Request
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
            'txtUsername' => 'required|unique:Users,username',
            'txtName' => 'required',
            'txtPassword' => 'required',
            'txtRepassword' => 'required'
        ];
    }

    public function messages() {
        return [
            'txtUsername.required' => 'Vui lòng điền đầy đủ thông tin!',
            'txtUsername.unique' => 'Tài khoản này đã tồn tại!',
            'txtName.required' => 'Vui lòng điền đầy đủ thông tin!',
            'txtPassword.required' => 'Vui lòng điền đầy đủ thông tin!',
            'txtRepassword.required' => 'Vui lòng điền đầy đủ thông tin'
        ];
    }
}
