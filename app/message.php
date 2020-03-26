<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    public function conversation(){
        return $this->belongsTo('App\conversation');
    }
    public function user(){
        return $this->belongsTo('App\user');
    }
}
