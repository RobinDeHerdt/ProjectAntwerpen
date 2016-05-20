<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    public $primaryKey = 'rating_id';

    public function project()
    {
        return $this->belongsTo('App\project','project_id');
    }

    public function user()
    {
        return $this->belongsTo('App\user','user_id');
    }
}
