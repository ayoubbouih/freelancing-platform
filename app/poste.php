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
    protected $fillable = [
        'intitule','projet_id','status','min','max'
    ];
}
