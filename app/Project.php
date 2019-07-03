<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = [
        'name', 'status', 'shared','created_by',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User','project_users');
    }

    public function projectusers()
    {

        return $this->hasMany('App\ProjectUser');
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

}
