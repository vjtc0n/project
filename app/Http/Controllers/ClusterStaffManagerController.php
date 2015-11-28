<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Permission;
use App\PermissionUser;
use App\Truong;
use App\Http\Requests\TaiKhoanNhanVienCumRequest;
use App\Http\Requests\TaiKhoanNhanVienTruongRequest;
use Hash;

class ClusterStaffManagerController extends Controller
{
    public function getTaoTaiKhoanNhanVienCum() {
        return view('admin.taoTaiKhoanQuanLyNhanVienCum');
    }

    public function postTaoTaiKhoanNhanVienCum(TaiKhoanNhanVienCumRequest $request) {
            
        // thêm vào bảng users
        $user = new User;
        $user->username = $request->txtUsername;
        $user->name = $request->txtName;
        $user->password = Hash::make($request->txtPassword);
        $user->save();

        // thêm vào bảng permission_user
        $permission = Permission::where('slug', 'clusterstaff')->get()[0];
        $permissionUser = new PermissionUser;
        $permissionUser->permission_id = $permission->id;
        $permissionUser->user_id = $user->id;
        $permissionUser->save();

        return redirect()->action('ClusterStaffManagerController@getTaoTaiKhoanNhanVienCum')
                ->with(['flash_level' => 'success', 'flash_message' => 'Thêm tài khoản thành công!']);
       
    }

    public function getTaoTaiKhoanNhanVienTruong() {
        return view('admin.taoTaiKhoanNhanVienTruong');
    }

    public function postTaoTaiKhoanNhanVienTruong(TaiKhoanNhanVienTruongRequest $request) {
            
        // thêm vào bảng users
        $user = new User;
        $user->username = $request->txtUsername;
        $user->name = $request->txtName;
        $user->password = Hash::make($request->txtPassword);
        $user->save();

        // thêm vào bảng permission_user
        $permission = Permission::where('slug', 'universitystaff')->get()->first();
        $permissionUser = new PermissionUser;
        $permissionUser->permission_id = $permission->id;
        $permissionUser->user_id = $user->id;
        $permissionUser->save();

        // thêm trường
        $truong = new Truong;
        $truong->tentr = $request->txtUniversity;
        $truong->matr = $request->txtUniversityCode;
        $truong->nhanvienquanly_user_id = $user->id;
        $truong->save();

        return redirect()->action('ClusterStaffManagerController@getTaoTaiKhoanNhanVienTruong')
                ->with(['flash_level' => 'success', 'flash_message' => 'Thêm tài khoản thành công!']);
    }
}
