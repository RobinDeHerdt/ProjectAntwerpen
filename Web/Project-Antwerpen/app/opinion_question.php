<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class opinion_question extends Model
{
	public $primaryKey = 'opinionquestion_id';

    public function project()
    {
        return $this->belongsTo('App\project','project_id');
    }

    public function votes()
    {
     	return $this->hasMany('App\vote', 'vote_id'); 
    }
}
