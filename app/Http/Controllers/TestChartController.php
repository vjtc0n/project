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
		$data = array(12,23,34);

return View::make('testlinechart')->with('data', $data);

	}

}