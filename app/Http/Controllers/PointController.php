<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PointController extends Controller
{
    public function getAdd(){
        return view('admin.point.add');
        //echo 'habskaskasb';
    }
    
     public function postAdd(Request $request){
        print_r($request->txtCateName);
      //$cate = new Cate;
     // $cate->name = $request->txtCateName;
     // $cate->alias = changeTitle($request->txtCateName);
     // $cate->order = $request->txtOrder;
     // $cate->parent_id = $request->sltParent;
      //$cate->keywords = $request->txtKeywords;
      //$cate->description =  $request->txtDescription;
     // $cate->save();
     // return redirect()->route('admin.cate.list')->with(['flash_level' =>'success','flash_message' => 'Success !!! Complete Add Category']);
}
}

