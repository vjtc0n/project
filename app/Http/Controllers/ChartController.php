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

class ChartController extends Controller
{

	public function lineChart()
	{
		$i = 0;
		while ($i < 20) {
			$data[$i] = 0 ;
			$i++ ;
		}

		$i = 0;
		while ($i < 20) {
			$day[$i] = $i+1 ;
			$i++ ;
		}

		$year = array(2015);
		$month = array(8);
		return response()->json(array('numberofstudent'=> $data,
									  'day'=> $day,
									  'year'=> $year,
									  'month' => $month
									   )) ;
						       

	}


	public function columnChart()
	{
		
		$i = 0;
		while ($i < 39) {
			$data[$i] = 0 ;
			$i++ ;
		}
		
		return View::make('column-chart')->with('data', $data);
	}



}

			/*
    		
    		*/