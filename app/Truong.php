<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Truong extends Model
{
    protected $table = 'truongs';
    
    protected $fillable = ['matr', 'tentr', 'nhanvienquanly_user_id'];
    
    public $timestamps = false;
    
    public function nganh(){
        return $this->hasMany('App\Nganh');
    }
}
