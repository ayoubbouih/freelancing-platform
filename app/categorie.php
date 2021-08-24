<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    public $timestamps = false;
    
    public function projets(){
        return $this->hasMany('App\projet');
    }
}
