<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class avi extends Model
{
    public function recrutement(){
        return $this->hasOne('App\recrutement');
    }
}
