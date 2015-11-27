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

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     public function getLogin()
    {
        //echo Cookie::get("api_token");
        return View::make('login');
        // echo Hash::make('1234');
    }

    public function postLogin(Request $request)
    {
    //echo "Touch";     
        $credentials = array(
                'username' => $request->user_input,
                'password'   => $request->password
        );
        $rules = array(
            'username' => 'required',
            'password' => 'required'
        );

        //dd($request->user_input);
        //dd($request->password);
        $validator = Validator::make($credentials, $rules);
        if ($validator->passes()) { 

            $check = Auth::attempt($credentials,true);          
            // dd(Session::get('user_name'));
            //dd( $check);
            if($check == true){
                //$username=Auth::user()->username;
                //$userId = $check['_id'];
				
				//return Redirect::to('/');
				return Redirect::to('/');
				
            }
            else{
                
                return Redirect::back()->with('fail',"Tài khoản không chính xác. Đăng nhập thất bại");
               
                
            }
        }
    }


     public function getLogout()
    {
        //echo Cookie::get("api_token");
        Auth::logout();
        return Redirect::to('/');
        // echo Hash::make('1234');
    }

     public function getTrangChu() {
        return redirect::to('/');
    }
}
