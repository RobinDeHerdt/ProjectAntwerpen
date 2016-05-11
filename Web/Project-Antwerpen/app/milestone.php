<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class milestone extends Model
{
	public $timestamps = false;
	
     public function project()
    {
        return $this->belongsTo('App\project','project_id');
    }
}
