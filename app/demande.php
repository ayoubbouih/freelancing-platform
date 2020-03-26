<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class demande extends Model
{
    public function poste(){
        return $this->belongsTo('App\poste');
    }
    public function conversation(){
        return $this->hasOne('App\conversation');
    }
}
