<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class recrutement extends Model
{
    public function avis(){
        return $this->hasOne('App\avi');
    }
    public function poste(){
        return $this->belongsTo('App\poste');
    }
    public function demande(){
        return $this->belongsTo('App\demande'); //hasOne
    }
    protected $fillable = ['poste_id','demande_id'];
}
