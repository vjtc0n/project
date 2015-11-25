<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Permission;
use App\PermissionUser;
use App\Http\Requests\TaiKhoanQuanLyNhanVienCumRequest;
use Hash;

class AdminController extends Controller
{
    public function getTaoTaiKhoanQuanLyNhanVienCum() {
        return view('admin.taoTaiKhoanQuanLyNhanVienCum');
    }

    public function postTaoTaiKhoanQuanLyNhanVienCum(TaiKhoanQuanLyNhanVienCumRequest $request) {
        if ($request->txtPassword === $request->txtRepassword) {
            
            // thêm vào bảng users
            $user = new User;
            $user->username = $request->txtUsername;
            $user->name = $request->txtName;
            $user->password = Hash::make($request->txtPassword);
            $user->save();

            // thêm vào bảng permission_user
            $permission = Permission::where('slug', 'clusterstaffmanager')->get()[0];
            $permissionUser = new PermissionUser;
            $permissionUser->permission_id = $permission->id;
            $permissionUser->user_id = $user->id;
            $permissionUser->save();

            return redirect()->action('AdminController@getTaoTaiKhoanQuanLyNhanVienCum')
                    ->with(['flash_level' => 'success', 'flash_message' => 'Thêm tài khoản thành công!']);
        } else {
            return redirect()->action('AdminController@getTaoTaiKhoanQuanLyNhanVienCum')
                    ->with(['flash_level' => 'danger', 'flash_message' => 'Hai mật khẩu không giống nhau!']);
        }
    }
}
