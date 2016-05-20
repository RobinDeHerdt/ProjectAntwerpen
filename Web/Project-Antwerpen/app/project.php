<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
	public function milestones()
    {
     	return $this->hasMany('App\milestone', 'project_id');   
    }

    public function comments()
    {
     	return $this->hasMany('App\comment', 'project_id');   
    }

    public function ratings()
    {
     	return $this->hasMany('App\rating', 'rating_id');   
    }
}
