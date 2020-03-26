<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class recrutement extends Model
{
    public function avis(){
        return $this->hasOne('App\avi');
    }
    public function poste(){
        return hasOne('App\poste');
    }
    public function demande(){
        return hasOne('App\demande');
    }
}
