<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $primaryKey = 'question_id';
	public $timestamps = false;
}
