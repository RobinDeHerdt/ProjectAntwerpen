<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	public function milestones()
    {
     	return $this->hasMany('App\milestone', 'project_id');   
    }

    public function comments()
    {
     	return $this->hasMany('App\comment', 'project_id');   
    }

    public function opinion_questions()
    {
     	return $this->hasMany('App\opinion_question', 'opinionquestion_id');   
    }
}
