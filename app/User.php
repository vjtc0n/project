<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Auth;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;

    protected $table = 'users';

    protected $hidden = array('password', 'remember_token');

    /**
     * A user will belong to many permissions.
     */
    public function permissions()
    {
        return $this->belongsToMany('Permission')->withTimestamps();
    }

    public static function check_login($user_input,$password)
    {
        //$result = User::where('username',$user_input)->where('password',$password)->first();  
        $data = array('username'=>$user_input,'password'=>$password);
        $result = Auth::attempt($data);
        if(!$result)
        {
            return false;
        }
        else{
            //          //Luu session
//            Session::put('user_id',$result['_id']);
//            Session::put('user_name',$result['username']);
            return $result;
        }
    }

}
