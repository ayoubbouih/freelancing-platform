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
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function recrutement(){
        return $this->hasOne('App\recrutement');
    }
        protected $fillable = [
        'description','user_id','poste_id','prix','duree'
    ];
}
