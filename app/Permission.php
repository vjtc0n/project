<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model {

    protected $table = 'permissions';

    /**
     * A permission will have many users.
     */
    public function users()
    {
        return $this->hasMany('App\User')->withTimestamps();   
    }

}
