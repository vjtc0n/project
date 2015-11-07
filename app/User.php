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
    protected $fillable = array('email', 'password');

    protected $hidden = array('password', 'remember_token');
    protected $primaryKey = "id";
    /**
     * A user will belong to many permissions.
     */
    public function permissions()
    {
        return $this->belongsToMany('Permission')->withTimestamps();
    }

   

}
