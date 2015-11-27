<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PointRequest extends Request
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
            'txtsbd' => 'required',
            'txtdmon1' => 'required',
            'txtdmon2' => 'required',
            'txtdmon3' => 'required',
            'txtkt' => 'required'
        ];
    }
    
    public function messages(){
        return[
             'txtsbd.required' => 'Bạn chưa nhập số báo danh',
             'txtdmon1.required' => 'Bạn chưa nhập điểm môn 1',
             'txtdmon2.required' => 'Bạn chưa nhập điểm môn 2',
             'txtdmon3.required' => 'Bạn chưa nhập điểm môn 3',
             'txtkt.required' => 'Bạn chưa nhập khối thi'
        ];
    }
}
