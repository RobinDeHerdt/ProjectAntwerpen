<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
	public function milestones()
    {
     	return $this->hasMany('App\milestone', 'milestone_id');   
    }
}
