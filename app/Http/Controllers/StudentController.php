<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\ThiSinh;
use App\Diem;
use App\Truong;
use Input, Response;

class StudentController extends Controller
{
    public function getTuyenSinh() {
        $student = ThiSinh::where('user_id', Auth::user()->id)->get()->first()->toArray();
        $diems = Diem::where('thisinh_id', $student['id'])->get()->toArray();
        $truongs = Truong::orderBy('tentr', 'ASC')->get()->toArray();
        return view('student.regi', ['student' => $student, 'diems' => $diems, 'truongs' => $truongs]);
    }

    public function postTimTruong() {
        $keyword = Input::get('keyword');
        $truongs = Truong::select('id', 'tentr', 'matr')
                ->where('tentr', 'LIKE', '%'.$keyword.'%')
                ->orWhere('matr', 'LIKE', '%'.$keyword.'%')
                ->get()->toArray();
        return json_encode($truongs);
    }
}
