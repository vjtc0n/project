<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DangKi extends Model
{
    protected $table = 'dang_kis';
    
    protected $fillable = ['thisinh_id','nganh_id'];
    
    public $timestamps = false;
    
    public function nganh(){
        return $this->belongTo('App\Nganh');
    }
    
    public function thisinh(){
        return $this->belongTo('App\ThiSinh');
    }
}
