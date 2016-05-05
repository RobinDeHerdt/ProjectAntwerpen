<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class milestone extends Model
{
     public function project()
    {
        return $this->belongsTo('App\project');
    }
}
