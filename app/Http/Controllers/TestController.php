<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Input;
use Validator;
use Hash;
use App\User;
use Auth;
use Illuminate\Support\Facades\Redirect;
class TestController extends Controller
{
	public function setScore(Request $request){
		$diem_khoa = 100;
		$points = array('1' => 10,
						'2' => 20,
						'3' => 10
						);
		
		// for ($i=0; $i < count($points); $i++) { 
		// 	if($diem_khoa - $points[i] >= 0.5){

		// 	}
		// }
		//$user_id = Auth::user()->id;
		// $student_id = $request->input('student_id');
		//getScoreByStudent($student_id);

		return response()->json(["notifcation"=>'Nguy hiem']) ;
	}
}