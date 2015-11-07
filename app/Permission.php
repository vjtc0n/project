<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model {

    /**
     * A permission will have many users.
     */
    public function users()
    {
        return $this->hasMany('User')->withTimestamps();   
    }

}
