<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StudentRequest extends Request
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
            'txtten' => 'required',
            'txtns' => 'required',
            'txtqq' => 'required',
            'txtkv' => 'required'
        ];
    }
    
    public function messages(){
        return [
             'txtten.required' => 'Vui lòng nhập họ tên thí sinh!',
             'txtns.required' => 'Vui lòng nhập năm sinh!',
             'txtqq.required' => 'Vui lòng nhập quê quán!',
             'txtkv.required' => 'Vui lòng nhập khu vực!'
        ];
    }
}
