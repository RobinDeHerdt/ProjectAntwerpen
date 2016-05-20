<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
	public $primaryKey = 'comment_id';

    public function project()
    {
        return $this->belongsTo('App\project','project_id');
    }

    public function user()
    {
        return $this->belongsTo('App\user','user_id');
    }
}
