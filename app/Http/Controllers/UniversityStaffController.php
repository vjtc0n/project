<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\NganhRequest;
use App\Nganh;
use App\Truong;
use Auth;

class UniversityStaffController extends Controller
{
    public function getListMajor() {
        return view('universitystaff.list');
    }

    public function getAddMajor() {
        return view('universitystaff.add');
    }

    public function postAddMajor(NganhRequest $request) {
        $nganh = new Nganh;
        $nganh->tennganh = $request->txtTenNganh;
        $nganh->manganh = $request->txtMaNganh;
        $nganh->diemchuan = $request->txtDiemChuan;
        $nganh->truong_id = Truong::where('nhanvienquanly_user_id', Auth::user()->id)->get()->first()->id;
        $nganh->save();
        return redirect()->action('UniversityStaffController@getAddMajor')
                    ->with(['flash_level' => 'success', 'flash_message' => 'Thêm ngành thành công!']);
    }

    public function getEditMajor() {
        return view('universitystaff.edit');
    }

    public function postEditMajor(NganhRequest $request) {
        
    }

    public function deleteMajor() {

    }
}
