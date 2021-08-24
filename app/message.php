<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    public function conversation(){
        return $this->belongsTo('App\conversation');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    protected $filliable=['conversation_id','user_id','recepteur_id','Vu','type_message','contenu'];
}
