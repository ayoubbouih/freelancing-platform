<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class avi extends Model
{
    public function recrutement(){
        return $this->belongsTo('App\recrutement');
    }
    protected $fillable =['recrutement_id','note','description'];
}
