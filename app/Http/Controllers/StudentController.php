<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth, Input, Response;;
use App\ThiSinh;
use App\Diem;
use App\Truong;
use App\Nganh;
use App\DangKi;
use App\Http\Requests\rutHSrequest;

class StudentController extends Controller
{
    public function getTuyenSinh() {
        $student = ThiSinh::where('user_id', Auth::user()->id)->get()->first()->toArray();
        $diems   = Diem::where('thisinh_id', $student['id'])->get()->toArray();
        $truongs = Truong::orderBy('tentr', 'ASC')->get()->toArray();
        $thisinh = ThiSinh::where('user_id', Auth::user()->id)->get()->first();
        $dangkis  = DangKi::where('thisinh_id', $thisinh->id)->get()->first();
        if($dangkis ==null) 
        {   
            $checknganh = 0;
            $nganh=0;
        }
        else
        {
        $nganh   = Nganh::select('id', 'manganh','tennganh','diemchuan')
                ->where('id', $dangkis->nganh_id)->get()->first();
        $checknganh = 1;
        }
        return view('student.regi', ['student' => $student, 'diems' => $diems, 'truongs' => $truongs, 'nganh' =>$nganh,'checknganh' =>$checknganh, 'dangkis'=>$dangkis]);
    }

    public function postTimTruong() {
        $keyword = Input::get('keyword');
        $truongs = Truong::select('id', 'tentr', 'matr')
                ->where('tentr', 'LIKE', '%'.$keyword.'%')
                ->orWhere('matr', 'LIKE', '%'.$keyword.'%')
                ->get()->toArray();
        return json_encode($truongs);
    }

    public function getLietKeNganh() {
        $truong_id = Input::get('truong_id');
        $nganhs = Nganh::select('id', 'manganh','tennganh','diemchuan')
                ->where('truong_id', $truong_id)->get()->toArray();
        return json_encode($nganhs);
    }

    public function getDangKy() {
        $manganh = Input::get('makhoa');
        $nganh = Nganh::select('id')->where('manganh', $manganh)->get()->first();
        $thisinh = ThiSinh::where('user_id', Auth::user()->id)->get()->first();
        $dangkicus = DangKi::where('thisinh_id', $thisinh->id)->get();
        foreach($dangkicus as $dangkicu) {
            $dangkicu->delete();
        }

        $dangki = new DangKi;
        $dangki->thisinh_id = $thisinh->id;
        $dangki->nganh_id = $nganh->id;
        $dangki->save();

        return 'Đăng ký thành công!';
    }
    public function rutHS(rutHSrequest $request)
    {
        $dangkyid = $request->dangkiid;
        echo $dangkyid;
        return view('base');
    }
}
