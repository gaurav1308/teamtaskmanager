<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    //
    protected $fillable = [
    'role_id', 'project_id', 'user_id',
    ];



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
