<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

//    public function roles()
//    {
//        return $this->belongsTo("App\Role");
//    }

    public function projects()
    {
        return $this->belongsToMany('App\Project','project_users')
        ->withPivot('role_id');
    }

//    public function projectusers()
//    {
//        return $this->hasM('App\ProjectUser');
//    }
}
