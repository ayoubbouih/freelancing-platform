<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class poste extends Model
{
    public $timestamps = false;

    public function projet(){
        return $this->belongsTo('App\projet');
    }
    public function demandes(){
        return $this->hasMany('App\demande');
    }
    public function conversations(){
        return $this->hasMany('App\conversation');
    }
    public function recrutement(){
        return $this->hasOne('App\recrutement');
    }
    protected $fillable = [
        'intitule','projet_id','status','min','max'
    ];
}
