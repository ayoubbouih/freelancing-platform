<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paiement extends Model
{
    public function user(){
        return $this->belongsTo('App\user');
    }
    protected $fillable = ['user_id','amount','mode_paiement','token','transaction_id'];
}
