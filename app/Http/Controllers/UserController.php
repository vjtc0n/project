<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Input;
use Validator;
use Hash;
use App\User;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Session;


use App\Diem;
use App\Thisinh;
use Request;
use DB;

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
                Session::flash('fail','Sai tài khoản');
                return Redirect::back()->withErrors($validator);
               
                
            }
        }
        else{
            Session::flash('fail','Sai tài khoản');
            return Redirect::back()->withErrors($validator->errors());
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

<<<<<<< HEAD

    public function changePasswd(Request $request)
    {
        //dd($request->input_password);
        //dd($request->re_password);
        $validator = Validator::make($request->all(), [
                    'input_password' => 'required|min:8',
                    're_password' => 'required|same:input_password',
                    
                        ], [
                    
                    'input_password.required' => 'Vui lòng nhập mật khẩu mới',
                    'input_password.min' => 'Độ dài tối thiểu của mật khẩu là 8',
                    're_password.same:input_password' => 'Mật khẩu nhập lại không đúng, vui lòng kiểm tra lại mật khẩu',
                    're_password.required' => 'Vui lòng nhập lại mật khẩu',
                        ]
        );

        
        if ($validator->passes()) {
            
            $user = Auth::user();
            $user->password = Hash::make($request->input_password);
            $user->save();
            //dd(Auth::user()->password);
            Auth::logout();
            //Session::get('success_changePasswd','Cập nhật mật khẩu thành công');

            return Redirect::to('/');
        }
        else {                       
            // validation has failed, display error messages
            return Redirect::back()
                ->withErrors($validator->errors());
            }
    }

    public function getchangePasswd(){
        return View::make('changepassword');
=======
    public function getTraDiem() {
        if (Request::ajax()) {
            $sbd = Request::get('txtSbd');
            $diems = DB::table('diems')
                        ->join('thi_sinhs', 'diems.thisinh_id', '=', 'thi_sinhs.id')
                        ->select('ten', 'sbd', 'mon1', 'mon2', 'mon3', 'khoi')
                        ->where('sbd', $sbd)
                        ->get();
            if (!empty($diems)) {
                return json_encode($diems);
            }
        }
>>>>>>> origin/master
    }
}
