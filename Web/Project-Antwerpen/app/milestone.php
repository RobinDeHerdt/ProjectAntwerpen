<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
	public $timestamps = false;
	public $primaryKey = 'milestone_id';
	
    public function project()
    {
        return $this->belongsTo('App\project','project_id');
    }
}
