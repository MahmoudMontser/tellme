<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    public function Questions(){
        return $this->hasMany('App\Question');
    }
}
