<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	public function milestones()
    {
     	return $this->hasMany('App\Milestone', 'project_id');   
    }

    public function comments()
    {
     	return $this->hasMany('App\Comment', 'project_id');   
    }

    public function opinion_questions()
    {
     	return $this->hasMany('App\Opinion_question', 'opinionquestion_id');   
    }
}
