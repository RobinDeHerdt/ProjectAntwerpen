<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vote extends Model
{
	public $primaryKey = 'vote_id';

    public function user()
    {
        return $this->belongsTo('App\user','user_id');
    }

    public function user()
    {
        return $this->belongsTo('App\opinion_question','opinionquestion_id');
    }
}
