<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TaiKhoanNhanVienTruongRequest extends Request
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
            'txtUniversity' => 'required',
            'txtUniversityCode' => 'required',
            'txtUsername' => 'required|unique:Users,username',
            'txtName' => 'required',
            'txtPassword' => 'required',
            'txtRepassword' => 'required|same:txtPassword'
        ];
    }

    public function messages() {
        return [
            'txtUniversity.required' => 'Vui lòng điền đầy đủ thông tin!',
            'txtUniversityCode.required' => 'Vui lòng điền đầy đủ thông tin!',
            'txtUsername.required' => 'Vui lòng điền đầy đủ thông tin!',
            'txtUsername.unique' => 'Tài khoản này đã tồn tại!',
            'txtName.required' => 'Vui lòng điền đầy đủ thông tin!',
            'txtPassword.required' => 'Vui lòng điền đầy đủ thông tin!',
            'txtRepassword.required' => 'Vui lòng điền đầy đủ thông tin',
            'txtRepassword.same' => 'Hai mật khẩu không trùng nhau!'
        ];
    }
}
