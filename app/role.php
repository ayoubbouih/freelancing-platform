<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    public $timestamps = false; //Disable created_at & updated_at for this model

    public function users(){
        return $this->hasMany('App\user');
    }
}
