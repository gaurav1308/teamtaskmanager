<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    public function projectusers()
    {
        return $this->belongsTo('App\ProjectUser');
    }
}
