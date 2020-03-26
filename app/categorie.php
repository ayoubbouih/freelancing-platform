<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    public function projects(){
        return $this->hasMany('App\projet');
    }
}
