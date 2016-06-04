<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	public $primaryKey = 'comment_id';

    public function project()
    {
        return $this->belongsTo('App\Project','project_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
