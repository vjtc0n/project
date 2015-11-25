<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diem extends Model
{
    protected $table = 'diems';
    
    protected $fillable = ['sbd','mon1','mon2','mon3','khoi','thisinh_id'];
    
    public $timestamps = false;
    
    public function thisinh(){
        return $this->belongTo('App\ThiSinh');
    }
}
