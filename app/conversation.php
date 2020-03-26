<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class conversastion extends Model
{
    public function demande(){
        return $this->hasOne('App\demande');
    }
    public function messages(){
        return $this->hasMany('App\message');
    }
}
