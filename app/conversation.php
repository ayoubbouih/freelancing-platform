<?php

namespace App;
use Auth;
use Illuminate\Database\Eloquent\Model;

class conversation extends Model
{
    protected $fillable=['demande_id','client_id','freelancer_id','support_id'];
    // protected $dates=['created_at','updated_at'];
    
    public function demande(){
        return $this->belongsTo('App\demande');//hasOne
    }
    public function messages(){
        return $this->hasMany('App\message');
    }
    public function poste(){
        return $this->belongsTo('App\poste');
    }
    public function nonlu(){
        return message::all()->where('conversation_id','=',$this->id)->where('Vu','=',0)->where('recepteur_id',"=",auth::user()->id);
    }
    public function lastMessage(){
        return message::where('conversation_id',$this->id)->orderBy('created_at','desc');
    }
}
