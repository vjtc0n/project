<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nganh extends Model
{
    protected $table = 'nganhs';
    
    protected $fillable = ['manganh','tennganh','diemchuan','truong_id'];
    
    public $timestamps = false;
    
    public function truong(){
        return $this->belongTo('App\Truong');
    }
    
    public function dangki(){
         return $this->hasMany('App\DangKi');
    }
}
