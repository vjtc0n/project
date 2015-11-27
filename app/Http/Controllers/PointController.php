<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\PointRequest;
use App\Diem;
class PointController extends Controller
{   
    
    public function getList(){
        return view('admin.point.list');
    }
    
    public function getAdd(){
        return view('admin.point.add');
    }
    
     public function postAdd(PointRequest $request){
      $point = new Diem;
      $point->sbd = $request->txtsbd;
      $point->mon1 = $request->txtdmon1;
      $point->mon2 = $request->txtdmon2;
      $point->mon3 = $request->txtdmon3;
      $point->khoi = $request->txtkt;
      $point->thisinh_id =3;
      $point->save();
      return redirect()->route('admin.point.list')->with(['flash_level' =>'success','flash_message' => 'Thêm điểm thành công!!!']);
} 
}

