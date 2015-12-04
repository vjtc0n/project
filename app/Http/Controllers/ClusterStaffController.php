<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\PointRequest;
use App\Http\Requests\StudentRequest;
use App\Permission;
use App\PermissionUser;
use App\Diem;
use App\ThiSinh;
use App\User;
use Hash;





class ClusterStaffController extends Controller
{   
    
    public function listStudentScore(){
       $data = ThiSinh::with('diems')->get();
       //echo '<pre>';
       print_r($data);
       //echo '</pre>'
       //return view('admin.student.listStudentScore',compact('data'));
    }
    
   //Quản lý thông tin thí sinh
   
   public function listStudent(){
       $data = ThiSinh::select('id','ten','gioitinh','namsinh','quequan','khuvuc')->orderBy('id','DESC')->get()->toArray();
       //print_r($data);
       return view('admin.student.list',compact('data'));
   }
   
   public function getStudent(){
       return view('admin.student.add');
   }
   
   public function postStudent(StudentRequest $request){
      $user = new User;
      $user->username = $request->txtten;
      $user->password = Hash::make($request->txtten);
      $user->name = $request->txtten;
      $user->save();
      $user_id = $user->id;
      
      $permission = Permission::where('slug', 'student')->get()->first();
      $permissionUser = new PermissionUser;
      $permissionUser->permission_id = $permission->id;
      $permissionUser->user_id = $user_id;
      $permissionUser->save();
    
      $student = new ThiSinh;
      $student->ten = $request->txtten;
      $student->gioitinh = $request->sltGt;
      $student->namsinh = $request->txtns;
      $student->quequan = $request->txtqq;
      $student->khuvuc = $request->txtkv;
      $student->user_id = $user_id;
      $student->save();
      $thisinh_id = $student->id;
      
      $point = new Diem;
      $point->sbd = $request->txtsbd;
      $point->mon1 = 0;
      $point->mon2 = 0;
      $point->mon3 = 0;
      $point->khoi = $request->txtkt;
      $point->thisinh_id = $thisinh_id;
      $point->save();
      
      return redirect()->route('cluster-staff.quan-ly-thong-tin-thi-sinh.listStudent')->with(['flash_level' =>'success','flash_message' => 'Success!!! Complete Add Student']);
   }
   
   public function getDeleteStudent($id){
      $student = ThiSinh::find($id);
      $student->delete($id);
      return redirect()->route('cluster-staff.quan-ly-thong-tin-thi-sinh.listStudent')->with(['flash_level' =>'success','flash_message' => 'Success!!! Complete Delete Student']);
   }
   
   public function getEditStudent($id){
      $data = ThiSinh::findOrFail($id)->toArray();
      return view('admin.student.edit',compact('data'));
   }
   
   public function postEditStudent(Request $request,$id){
      $this->validate($request,
          ['txtten' => 'required'],
          ['txtten.required' => 'Vui lòng nhập họ tên thí sinh!'],
          ['txtgt' => 'required'],
          ['txtgt.required' => 'Vui lòng nhập giới tính!'],
          ['txtns' => 'required'],
          ['txtns.required' => 'Vui lòng nhập năm sinh!'],
          ['txtqq' => 'required'],
          ['txtqq.required' => 'Vui lòng nhập quê quán!'],
          ['txtkv' => 'required'],
          ['txtkv.required' => 'Vui lòng nhập khu vực!']   
      );
          
      $student = ThiSinh::find($id);
      $student->ten = $request->txtten;
      $student->gioitinh = $request->sltGt;
      $student->namsinh = $request->txtns;
      $student->quequan = $request->txtqq;
      $student->khuvuc = $request->txtkv;
      $student->save();
      
      return redirect()->route('cluster-staff.quan-ly-thong-tin-thi-sinh.listStudent')->with(['flash_level' =>'success','flash_message' => 'Success!!! Complete Edit Student']);
   
   }
   
    
    //Quản lý điểm 
    
    public function listScore(){
        $data = Diem::select('id','sbd','mon1','mon2','mon3','khoi')->orderBy('id','DESC')->get()->toArray();
        return view('admin.point.list',compact('data'));
    }
    
   public function getDeleteScore($id){
      $point = Diem::find($id);
      $point->delete($id);
      return redirect()->route('cluster-staff.quan-ly-diem-thi.listScore')->with(['flash_level' =>'success','flash_message' => 'Xóa điểm thành công!!!']);
   } 
   
   public function getEditScore($id){
      $data = Diem::findOrFail($id)->toArray();
      return view('admin.point.edit',compact('data'));
   }
   
   public function postEditScore(Request $request,$id){
       $this->validate($request,
          ['txtsbd' => 'required'],
          ['txtsbd.required' => 'Bạn chưa nhập số báo danh!'],
          ['txtdmon1' => 'required'],
          ['txtdmon1.required' => 'Bạn chưa nhập điểm môn 1!'],
          ['txtdmon2' => 'required'],
          ['txtdmon2.required' => 'Bạn chưa nhập điểm môn 2!'],
          ['txtdmon3' => 'required'],
          ['txtdmon3.required' => 'Bạn chưa nhập điểm môn 3!'],
          ['txtkt' => 'required'],
          ['txtkt.required' => 'Bạn chưa nhập khối thi!']   
      );
      
      $point = Diem::find($id);
      $point->sbd = $request->txtsbd;
      $point->mon1 = $request->txtdmon1;
      $point->mon2 = $request->txtdmon2;
      $point->mon3 = $request->txtdmon3;
      $point->khoi = $request->txtkt;
      $point->save();
      return redirect()->route('cluster-staff.quan-ly-thong-tin-thi-sinh.listStudent')->with(['flash_level' =>'success','flash_message' => 'Success!!! Complete Edit Point']);
   }
   
  
}

