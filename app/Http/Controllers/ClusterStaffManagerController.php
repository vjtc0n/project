<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Permission;
use App\PermissionUser;
use App\Http\Requests\TaiKhoanNhanVienCumRequest;
use Hash;

class ClusterStaffManagerController extends Controller
{
    public function getTaoTaiKhoanNhanVienCum() {
        return view('admin.taoTaiKhoanQuanLyNhanVienCum');
    }

    public function postTaoTaiKhoanNhanVienCum(TaiKhoanNhanVienCumRequest $request) {
        if ($request->txtPassword === $request->txtRepassword) {
            
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
        } else {
            return redirect()->action('ClusterStaffManagerController@getTaoTaiKhoanNhanVienCum')
                    ->with(['flash_level' => 'danger', 'flash_message' => 'Hai mật khẩu không giống nhau!']);
        }
    }
}
