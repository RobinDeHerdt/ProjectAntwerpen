<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opinion_question extends Model
{
	public $primaryKey = 'opinionquestion_id';
	public $timestamps = false;
	
    public function project()
    {
        return $this->belongsTo('App\Project','project_id');
    }
}
