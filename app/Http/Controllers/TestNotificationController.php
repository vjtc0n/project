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
class TestNotificationController extends Controller
{
	public function getNotice(){
		
		
		$tongDiem = 21;
		$scoreStudent = 20;
		if (($tongDiem - $scoreStudent) >= 0.5) {

			return response()->json(array(['notification'=>'Nguy hiem']));
		}
		else return response()->json(["notification"=>'Nguy hiem']);

		return response()->json(array(['notification'=>'Nguy hiem']));
		// for ($i=0; $i < count($points); $i++) { 
		// 	if($diem_khoa - $points[i] >= 0.5){

		// 	}
		// }
		//$user_id = Auth::user()->id;
		// $student_id = $request->input('student_id');
		//getScoreByStudent($student_id);

		
	}
}