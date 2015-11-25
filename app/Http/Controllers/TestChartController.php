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

class TestChartController extends Controller
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
		return response()->json(array('data'=> $data,
									  'day'=> $day)) 
						 ->with('year',$year)
						 ->with('month',$month);
									      

	}


	public function columnChart()
	{
		
		$i = 0;
		while ($i < 39) {
			$data[$i] = 0 ;
			$i++ ;
		}
		
		return View::make('test-chart')->with('data', $data);
	}

}

			/*
    		int i = 0;
    		while(i<20)
    		{	
    			data.addRows([new Date(	{!!$year[0]!!},
    								   	{!!$month[0]!!},
    								   	{!!$day[i]!!}
    								   ),
    								   {!!$data[i]!!}
    						 ]);

    			i++;
    		}
    		*/