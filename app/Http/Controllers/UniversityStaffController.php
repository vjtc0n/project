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
        $truong_id = Truong::where('nhanvienquanly_user_id', Auth::user()->id)->get()->first()->id;
        $nganhs = Nganh::where('truong_id', $truong_id)->get()->toArray();
        return view('universitystaff.list', ['nganhs' => $nganhs]);
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

    public function getEditMajor($id) {
        $nganhs = Nganh::where('id', $id)->get();
        if ($nganhs == null) {
            return redirect()->action('UniversityStaffController@getListMajor');
        }
        $truong_id = $nganhs->first()->truong_id;

        $truongs = Truong::where('id', $truong_id);
        if ($truongs == null) {
            return redirect()->action('UniversityStaffController@getListMajor');
        }
        $nhanvientruong_id = $truongs->first()->nhanvienquanly_user_id;

        if ($nhanvientruong_id != Auth::user()->id) {
            return redirect()->action('UniversityStaffController@getListMajor');
        }

        $nganh = $nganhs->first()->toArray();
        return view('universitystaff.edit', ['nganh' => $nganh]);
    }

    public function postEditMajor(NganhRequest $request, $id) {
        $nganhs = Nganh::where('id', $id)->get();
        if ($nganhs == null) {
            return redirect()->action('UniversityStaffController@getListMajor');
        }
        $nganh = $nganhs->first();
        $nganh->tennganh = $request->txtTenNganh;
        $nganh->manganh = $request->txtMaNganh;
        $nganh->diemchuan = $request->txtDiemChuan;
        $nganh->truong_id = Truong::where('nhanvienquanly_user_id', Auth::user()->id)->get()->first()->id;
        $nganh->save();
        return redirect()->action('UniversityStaffController@getListMajor')
                    ->with(['flash_level' => 'success', 'flash_message' => 'Sửa ngành thành công!']);
    }

    public function deleteMajor($id) {
        $nganhs = Nganh::find($id);
        if ($nganhs == null) {
            return redirect()->action('UniversityStaffController@getListMajor');
        }
        $truong_id = $nganhs->first()->truong_id;

        $truongs = Truong::find($truong_id);
        if ($truongs == null) {
            return redirect()->action('UniversityStaffController@getListMajor');
        }
        $nhanvientruong_id = $truongs->first()->nhanvienquanly_user_id;

        if ($nhanvientruong_id != Auth::user()->id) {
            return redirect()->action('UniversityStaffController@getListMajor');
        }

        $nganhs->delete();
        return redirect()->action('UniversityStaffController@getListMajor');
    }
}
