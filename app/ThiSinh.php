<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThiSinh extends Model
{
    protected $table = 'thi_sinhs';
    
    protected $fillable = ['ten','gioitinh','namsinh','quequan','khuvuc','user_id'];
    
    public $timestamps = false;
    
    public function diem(){
        return $this->hasMany('App\Diem');
    }
    
    public function user(){
        return $this->belongTo('App\User');
    }
}
