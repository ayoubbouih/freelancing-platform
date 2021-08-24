<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    protected $fillable=['type','notifiable_type','user_id','data'];
}
