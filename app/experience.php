<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class experience extends Model
{
    public $timestamps = false;
    protected $dates=['date'];
    
    public function user(){
        return $this->belongsTo('App\user');
    }
}
