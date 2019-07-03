<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    //
    public function users()
    {
        return $this->belongsTo('App\User');
    }


    public function projects()
    {
        return $this->belongsTo('App\Project');
    }

    public function roles()
    {
        return $this_.hasOne('App\Role');

    }
}
