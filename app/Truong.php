<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Truong extends Model
{
    protected $table = 'truongs';
    
    protected $fillable = ['matr','tentr'];
    
    public $timestamps = false;
    
    public function nganh(){
        return $this->hasMany('App\Nganh');
    }
}
