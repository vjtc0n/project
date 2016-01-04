<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model {

    protected $table = 'permissions';

    protected $fillable = array('name', 'slug');

    /**
     * A permission will have many users.
     */
    public function users()
    {
        return $this->hasMany('App\User')->withTimestamps();   
    }

}
