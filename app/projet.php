<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class projet extends Model
{
    public function categorie(){
        return $this->belongsTo('App\categorie');
    }
    public function postes(){
        return $this->hasMany('App\poste');
    }
    public function user(){
        return $this->belongsTo('App\user');
    }

    protected $fillable = [
        'intitule', 'description','user_id','categorie_id','status','f_attachees'
    ];
}
